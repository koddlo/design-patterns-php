<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Config;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

final class ConfigTest extends TestCase
{
    public function testIsConstructorPrivate(): void
    {
        $configReflection = new ReflectionClass(Config::class);

        self::assertFalse($configReflection->getConstructor()->isPublic());
    }

    public function testIfOnlyOneInstanceExists(): void
    {
        $config = Config::getInstance();
        $secondConfig = Config::getInstance();

        self::assertSame($config, $secondConfig);
    }

    public function testCannotCloneConfig(): void
    {
        $config = Config::getInstance();

        self::expectException(Exception::class);

        clone $config;
    }

    public function testCannotDeserializeConfig(): void
    {
        $config = Config::getInstance();

        self::expectException(Exception::class);

        unserialize(serialize($config));
    }
}
