<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Singleton\Test;

use DesignPatterns\Creational\Singleton\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testIsConstructorPrivate(): void
    {
        $configReflection = new \ReflectionClass(Config::class);
        $this->assertFalse($configReflection->getConstructor()->isPublic());
    }

    public function testIfOnlyOneInstanceExists(): void
    {
        $config = Config::getInstance();
        $secondConfig = Config::getInstance();

        $this->assertSame($config, $secondConfig);
    }

    public function testCannotCloneConfig(): void
    {
        $config = Config::getInstance();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Config is singleton - it cannot be cloned');

        $configClone = clone $config;
    }

    public function testCannotDeserializeConfig(): void
    {
        $config = Config::getInstance();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Config is singleton - it cannot be unserialized');

        unserialize(serialize($config));
    }
}
