<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject\Test;

use DesignPatterns\Behavioral\NullObject\Client;
use DesignPatterns\Behavioral\NullObject\ClientType;
use DesignPatterns\Behavioral\NullObject\ClientTypeInterface;
use DesignPatterns\Behavioral\NullObject\NullClientType;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    public function testCanSetType(): void
    {
        $clientType = new ClientType(2);
        $client = new Client();

        $client->setType($clientType);

        self::assertEquals($clientType, $client->getType());
        self::assertInstanceOf(ClientTypeInterface::class, $client->getType());
    }

    public function testCanGetTypeWhenIsNull(): void
    {
        $client = new Client();

        self::assertInstanceOf(NullClientType::class, $client->getType());
        self::assertInstanceOf(ClientTypeInterface::class, $client->getType());
    }
}
