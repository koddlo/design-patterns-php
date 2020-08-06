<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject\Test;

use DesignPatterns\Behavioral\NullObject\Client;
use DesignPatterns\Behavioral\NullObject\ClientType;
use DesignPatterns\Behavioral\NullObject\ClientTypeInterface;
use DesignPatterns\Behavioral\NullObject\NullClientType;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCanSetType(): void
    {
        $clientType = new ClientType(2);
        $client = new Client();
        $client->setType($clientType);

        $this->assertEquals($clientType, $client->getType());
        $this->assertInstanceOf(ClientTypeInterface::class, $client->getType());
    }

    public function testCanGetTypeWhenIsNull(): void
    {
        $client = new Client();

        $this->assertInstanceOf(NullClientType::class, $client->getType());
        $this->assertInstanceOf(ClientTypeInterface::class, $client->getType());
    }
}
