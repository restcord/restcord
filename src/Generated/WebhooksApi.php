<?php

declare(strict_types=1);

namespace RestCord\Generated;

use GuzzleHttp\Promise\PromiseInterface;
use RestCord\ResourceClient;

final class WebhooksApi
{
    public function __construct(private readonly ResourceClient $client)
    {
    }

    public function deleteOriginalWebhookMessage(array $options = []): mixed
    {
        return $this->deleteOriginalWebhookMessageAsync($options)->wait();
    }

    public function deleteOriginalWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_original_webhook_message', $options);
    }

    public function deleteWebhook(array $options = []): mixed
    {
        return $this->deleteWebhookAsync($options)->wait();
    }

    public function deleteWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_webhook', $options);
    }

    public function deleteWebhookByToken(array $options = []): mixed
    {
        return $this->deleteWebhookByTokenAsync($options)->wait();
    }

    public function deleteWebhookByTokenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_webhook_by_token', $options);
    }

    public function deleteWebhookMessage(array $options = []): mixed
    {
        return $this->deleteWebhookMessageAsync($options)->wait();
    }

    public function deleteWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('delete_webhook_message', $options);
    }

    public function executeGithubCompatibleWebhook(array $options = []): mixed
    {
        return $this->executeGithubCompatibleWebhookAsync($options)->wait();
    }

    public function executeGithubCompatibleWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('execute_github_compatible_webhook', $options);
    }

    public function executeSlackCompatibleWebhook(array $options = []): mixed
    {
        return $this->executeSlackCompatibleWebhookAsync($options)->wait();
    }

    public function executeSlackCompatibleWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('execute_slack_compatible_webhook', $options);
    }

    public function executeWebhook(array $options = []): mixed
    {
        return $this->executeWebhookAsync($options)->wait();
    }

    public function executeWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('execute_webhook', $options);
    }

    public function getOriginalWebhookMessage(array $options = []): mixed
    {
        return $this->getOriginalWebhookMessageAsync($options)->wait();
    }

    public function getOriginalWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_original_webhook_message', $options);
    }

    public function getWebhook(array $options = []): mixed
    {
        return $this->getWebhookAsync($options)->wait();
    }

    public function getWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_webhook', $options);
    }

    public function getWebhookByToken(array $options = []): mixed
    {
        return $this->getWebhookByTokenAsync($options)->wait();
    }

    public function getWebhookByTokenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_webhook_by_token', $options);
    }

    public function getWebhookMessage(array $options = []): mixed
    {
        return $this->getWebhookMessageAsync($options)->wait();
    }

    public function getWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('get_webhook_message', $options);
    }

    public function updateOriginalWebhookMessage(array $options = []): mixed
    {
        return $this->updateOriginalWebhookMessageAsync($options)->wait();
    }

    public function updateOriginalWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_original_webhook_message', $options);
    }

    public function updateWebhook(array $options = []): mixed
    {
        return $this->updateWebhookAsync($options)->wait();
    }

    public function updateWebhookAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_webhook', $options);
    }

    public function updateWebhookByToken(array $options = []): mixed
    {
        return $this->updateWebhookByTokenAsync($options)->wait();
    }

    public function updateWebhookByTokenAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_webhook_by_token', $options);
    }

    public function updateWebhookMessage(array $options = []): mixed
    {
        return $this->updateWebhookMessageAsync($options)->wait();
    }

    public function updateWebhookMessageAsync(array $options = []): PromiseInterface
    {
        return $this->client->requestAsync('update_webhook_message', $options);
    }
}
