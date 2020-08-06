<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Singleton;

final class Config
{
    private static ?Config $instance = null;

    private function __construct() {}

    public static function getInstance(): Config
    {
        if (self::$instance === null) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    public function __clone()
    {
        throw new \Exception('Config is singleton - it cannot be cloned');
    }

    public function __wakeup()
    {
        throw new \Exception('Config is singleton - it cannot be unserialized');
    }

    public function __unserialize(array $data)
    {
        throw new \Exception('Config is singleton - it cannot be unserialized');
    }
}
