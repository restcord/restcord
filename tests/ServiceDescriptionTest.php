<?php

/*
 * Copyright 2017 Aaron Scherer
 *
 * This source file is subject to the license that is bundled
 * with this source code in the file LICENSE
 *
 * @package     restcord/restcord
 * @copyright   Aaron Scherer 2017
 * @license     MIT
 */

namespace RestCord\Tests;

use GuzzleHttp\Command\Result;
use PHPUnit\Framework\TestCase;
use RestCord\DiscordClient;

/**
 * @author Aaron Scherer <aequasi@gmail.com>
 *
 * ServiceDescriptionTest Class
 */
class ServiceDescriptionTest extends TestCase
{
    /**
     * @var array
     */
    public $description;

    /**
     * @var DiscordClient
     */
    public $client;

    public function setUp()
    {
        $this->description = json_decode(
            file_get_contents(__DIR__.'/../src/Resources/service_description-v6.json'),
            true
        );
        $this->client      = new DiscordClient(['token' => 'fake-token']);
    }

    public function testBaseUri()
    {
        $this->assertEquals('https://discordapp.com/api/v6', $this->description['baseUri']);
    }

    public function testVersion()
    {
        $this->assertEquals('6', $this->description['version']);
    }

    public function testOperationResources()
    {
        foreach ($this->description['operations'] as $resource => $operations) {
            $resource = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $resource)));
            $class    = '\\RestCord\\Interfaces\\'.ucwords($resource);
            $this->assertTrue(interface_exists($class), 'Could not find interface: '.$class);

            $refl = new \ReflectionClass($class);
            foreach ($operations as $method => $operation) {
                $this->assertTrue($refl->hasMethod($method));
                $reflMethod = $refl->getMethod($method);
                if (isset($operation['responseTypes']) && count($operation['responseTypes']) >= 1) {
                    $firstType = $operation['responseTypes'][0]['type'];
                    $array     = stripos($firstType, 'Array<') !== false;
                    if ($array) {
                        $firstType = substr($firstType, 6, -1);
                    }
                    $firstType = explode('/', $firstType);

                    $returnType = sprintf(
                        '\\RestCord\\Model\\%s\\%s',
                        str_replace(
                            ' ',
                            '',
                            ucwords(str_replace('-', ' ', $firstType[0]))
                        ),
                        str_replace(
                            ' ',
                            '',
                            ucwords(str_replace('-', ' ', $firstType[1]))
                        )
                    );

                    $returnType = $this->mapBadDocs($returnType);

                    if (!class_exists($returnType)) {
                        $returnType = '\\'.Result::class;
                    }

                    $returnType .= $array ? '[]' : '';

                    $this->assertEquals($returnType, $this->getReturnType($reflMethod));
                }
            }
        }
    }

    public function testModels()
    {
        foreach ($this->description['models'] as $resource => $models) {
            $resource  = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $resource)));
            $namespace = '\\RestCord\\Model\\'.ucwords($resource).'\\';

            foreach ($models as $method => $data) {
                $class = $namespace.ucwords($method);
                $this->assertTrue(class_exists($class), 'Could not find interface: '.$class);
                $refl = new \ReflectionClass($class);
                foreach ($data['properties'] as $name => $info) {
                    $name = lcfirst(str_replace([' ', '?'], '', str_replace('-', '_', $name)));
                    $this->assertTrue($refl->hasProperty($name), "Cannot find property $name on $class");
                }
            }
        }
    }

    private function mapBadDocs($cls)
    {
        switch ($cls) {
            case '\RestCord\Model\User\DmChannel':
                $cls = '\RestCord\Model\Channel\DmChannel';
                break;
            case '\RestCord\Model\Channel\Invite':
            case '\RestCord\Model\Guild\Invite':
                $cls = '\RestCord\Model\Invite\Invite';
                break;
            case '\RestCord\Model\Guild\GuildChannel':
                $cls = '\RestCord\Model\Channel\GuildChannel';
                break;
            case '\RestCord\Model\Guild\User':
            case '\RestCord\Model\Channel\User':
                $cls = '\RestCord\Model\User\User';
                break;
            default:
                return $cls;
        }

        return $cls;
    }

    private function getReturnType(\ReflectionMethod $reflMethod)
    {
        $comment = $reflMethod->getDocComment();
        $regex   = '/@return ([\\\\A-Za-z\[\]]+)/';
        preg_match($regex, $comment, $matches);
        if (empty($matches)) {
            return;
        }

        return $matches[1];
    }
}
