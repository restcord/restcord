<?php

declare(strict_types=1);

namespace RestCord;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RestCord\Exception\DiscordRequestException;
use RestCord\RateLimit\RateLimiter;

final class ResourceClient
{
    public function __construct(
        private readonly array $operations,
        private readonly ClientInterface $client,
        private readonly ?string $token = null,
        private readonly string $tokenType = 'Bot',
        ?LoggerInterface $logger = null
    ) {
        $this->logger = $logger ?? new NullLogger();
    }

    private readonly LoggerInterface $logger;

    public function requestAsync(string $operationId, array $options = []): PromiseInterface
    {
        if (!isset($this->operations[$operationId])) {
            return Create::rejectionFor(new \InvalidArgumentException("Unknown Discord operation: {$operationId}"));
        }

        try {
            $operation = $this->operations[$operationId];
            $request = $this->request($operationId, $operation, $options);
            $promise = $this->client->requestAsync($operation['httpMethod'], $request['path'], $request['options']);
        } catch (\Throwable $exception) {
            return Create::rejectionFor($exception);
        }

        return $promise->then(function (ResponseInterface $response) use ($operationId, $operation): mixed {
            $this->logger->info('Discord response received.', ['operationId' => $operationId, 'status' => $response->getStatusCode()]);

            return $this->decodeResponse($operation, $response);
        });
    }

    private function decodeResponse(array $operation, ResponseInterface $response): mixed
    {
        $status = $response->getStatusCode();
        if ($status < 200 || $status >= 300) {
            throw $this->discordException($response);
        }

        if (!array_key_exists($status, $operation['responses'])) {
            throw new \UnexpectedValueException("Unexpected success status {$status}.");
        }

        $codec = $operation['responses'][$status];
        if ($codec === 'empty' || $response->getBody()->getSize() === 0) {
            return null;
        }
        if ($codec === 'stream') {
            return $response->getBody();
        }

        $content = (string) $response->getBody();
        return $content === '' ? null : json_decode($content, true, flags: JSON_THROW_ON_ERROR);
    }

    private function discordException(ResponseInterface $response): DiscordRequestException
    {
        $payload = json_decode((string) $response->getBody(), true);
        $payload = is_array($payload) ? $payload : [];
        $message = isset($payload['message']) && is_string($payload['message']) ? $payload['message'] : null;
        $code = isset($payload['code']) && is_int($payload['code']) ? $payload['code'] : null;

        return new DiscordRequestException(
            $response->getStatusCode(),
            $code,
            $message,
            $payload['errors'] ?? null,
            $response
        );
    }

    private function request(string $operationId, array $operation, array $options): array
    {
        $allowed = [];
        foreach ($operation['parameters'] as $parameter) {
            $allowed[$parameter['name']] = true;
            if ($parameter['required'] && !array_key_exists($parameter['name'], $options)) {
                throw new \InvalidArgumentException("Missing required parameter {$parameter['name']} for {$operationId}.");
            }
        }

        if (isset($operation['requestBody'])) {
            $allowed['body'] = true;
            if ($operation['requestBody']['required'] && !array_key_exists('body', $options)) {
                throw new \InvalidArgumentException("Missing required body for {$operationId}.");
            }
        }

        foreach ($options as $name => $_) {
            if (!isset($allowed[$name])) {
                throw new \InvalidArgumentException("Unknown option {$name} for {$operationId}.");
            }
        }

        $path = $operation['path'];
        $query = [];
        $headers = [];
        foreach ($operation['parameters'] as $parameter) {
            $name = $parameter['name'];
            if (!array_key_exists($name, $options)) {
                continue;
            }

            $value = $options[$name];
            if ($parameter['location'] === 'path') {
                $path = str_replace('{'.$name.'}', rawurlencode($this->simple($value)), $path);
            } elseif ($parameter['location'] === 'query') {
                $query = [...$query, ...$this->query($name, $value)];
            } else {
                $headers[$parameter['wireName'] ?? $name] = ($parameter['wireName'] ?? null) === 'X-Audit-Log-Reason'
                    ? rawurlencode($this->simple($value))
                    : $this->simple($value);
            }
        }

        $this->authorize($operationId, $operation, $headers);
        $request = ['headers' => $headers];
        if ($query !== []) {
            $request['query'] = implode('&', $query);
        }
        if (array_key_exists('body', $options)) {
            $request += $this->body($operationId, $operation['requestBody'], $options['body']);
        }
        $request[RateLimiter::OPTION] = $this->rateLimitMetadata($operationId, $operation, $options);

        return ['path' => ltrim($path, '/'), 'options' => $request];
    }

    private function rateLimitMetadata(string $operationId, array $operation, array $options): array
    {
        $major = [];
        foreach ($operation['majorParameters'] ?? [] as $name) {
            if (!array_key_exists($name, $options)) {
                continue;
            }

            $value = $this->scalar($options[$name]);
            $major[] = $name.'='.($name === 'webhook_token' ? hash('sha256', $value) : rawurlencode($value));
        }

        return [
            'operationId' => $operationId,
            'method' => $operation['httpMethod'],
            'route' => $operation['path'],
            'interactionRoute' => $operation['interactionRoute'] ?? false,
            'majorScope' => implode('|', $major),
            'globalScope' => $this->token === null || $this->token === '' ? 'anonymous' : hash('sha256', $this->token),
        ];
    }

    private function simple(mixed $value): string
    {
        if (!is_array($value)) {
            return $this->scalar($value);
        }

        $values = [];
        foreach ($value as $key => $item) {
            if (!is_int($key)) {
                $values[] = $this->scalar($key);
            }
            $values[] = $this->scalar($item);
        }

        return implode(',', $values);
    }

    private function query(string $name, mixed $value): array
    {
        if (!is_array($value)) {
            return [$this->encode($name).'='.$this->encode($value)];
        }

        $query = [];
        foreach ($value as $key => $item) {
            $query[] = is_int($key)
                ? $this->encode($name).'='.$this->encode($item)
                : $this->encode($key).'='.$this->encode($item);
        }

        return $query;
    }

    private function encode(mixed $value): string
    {
        return rawurlencode($this->scalar($value));
    }

    private function scalar(mixed $value): string
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        if ($value === null || is_string($value) || is_int($value) || is_float($value)) {
            return (string) $value;
        }

        throw new \InvalidArgumentException('Parameter values must be scalar or null.');
    }

    private function authorize(string $operationId, array $operation, array &$headers): void
    {
        $alternatives = $operation['security'] ?? [[]];
        $anonymous = in_array([], $alternatives, true);
        $scheme = $this->tokenType === 'OAuth' ? 'OAuth2' : 'BotToken';
        $allowed = false;
        foreach ($alternatives as $alternative) {
            if (array_key_exists($scheme, $alternative)) {
                $allowed = true;
                break;
            }
        }

        if ($this->token === null || $this->token === '') {
            if (!$anonymous) {
                throw new \InvalidArgumentException("Authentication is required for {$operationId}.");
            }

            return;
        }

        if (!$allowed && !$anonymous) {
            throw new \InvalidArgumentException("{$this->tokenType} authentication is not accepted for {$operationId}.");
        }

        if ($allowed) {
            $headers['Authorization'] = ($scheme === 'OAuth2' ? 'Bearer ' : 'Bot ').$this->token;
        }
    }

    private function body(string $operationId, array $body, mixed $payload): array
    {
        $hasBinary = false;
        if (is_array($payload)) {
            foreach ($body['binaryFields'] ?? [] as $field) {
                if (array_key_exists($field, $payload)) {
                    $hasBinary = true;
                    break;
                }
            }
        }
        if ($hasBinary && in_array('multipart/form-data', $body['mediaTypes'], true)) {
            return ['multipart' => $this->multipart($operationId, $body, $payload)];
        }
        if (in_array('application/json', $body['mediaTypes'], true)) {
            return ['json' => $payload];
        }

        throw new \InvalidArgumentException("No supported request media type for {$operationId}.");
    }

    private function multipart(string $operationId, array $body, array $payload): array
    {
        $files = array_flip($body['binaryFields'] ?? []);
        $parts = [];
        $fields = [];
        foreach ($payload as $name => $value) {
            if (!isset($files[$name])) {
                $fields[$name] = $value;
                continue;
            }
            if (!is_array($value) || !array_key_exists('contents', $value)) {
                throw new \InvalidArgumentException("Invalid multipart descriptor for {$name} in {$operationId}.");
            }

            $contents = $value['contents'];
            if (!is_resource($contents) && !$contents instanceof StreamInterface && !is_string($contents)) {
                throw new \InvalidArgumentException("Invalid multipart contents for {$name} in {$operationId}.");
            }
            $filename = $value['filename'] ?? $this->filename($contents);
            if (!is_string($filename) || $filename === '') {
                throw new \InvalidArgumentException("Multipart filename is required for {$name} in {$operationId}.");
            }
            $contentType = $value['content_type'] ?? 'application/octet-stream';
            if (!is_string($contentType) || $contentType === '') {
                throw new \InvalidArgumentException("Invalid multipart content_type for {$name} in {$operationId}.");
            }

            $parts[] = ['name' => $name, 'contents' => $contents, 'filename' => $filename, 'headers' => ['Content-Type' => $contentType]];
        }

        if (($body['payloadJson'] ?? false) === true) {
            array_unshift($parts, [
                'name' => 'payload_json',
                'contents' => json_encode($fields, JSON_THROW_ON_ERROR),
                'headers' => ['Content-Type' => 'application/json'],
            ]);
        } else {
            foreach ($fields as $name => $value) {
                $parts[] = [
                    'name' => $name,
                    'contents' => is_array($value) || is_object($value)
                        ? json_encode($value, JSON_THROW_ON_ERROR)
                        : $this->scalar($value),
                ];
            }
        }

        return $parts;
    }

    private function filename(mixed $contents): ?string
    {
        if (!is_resource($contents)) {
            return null;
        }

        $uri = stream_get_meta_data($contents)['uri'] ?? '';

        return is_string($uri) && is_file($uri) ? basename($uri) : null;
    }
}
