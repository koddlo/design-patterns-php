<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Singleton;

use Exception;

final class Config
{
    private static ?Config $instance = null;

    private function __construct()
    {
    }

    public static function getInstance(): Config
    {
        if (null === self::$instance) {
            self::$instance = new Config();
        }

        return self::$instance;
    }

    /**
     * @throws Exception
     */
    public function __clone()
    {
        throw new Exception('Config is singleton - it cannot be cloned');
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception('Config is singleton - it cannot be unserialized');
    }

    /**
     * @throws Exception
     */
    public function __unserialize(array $data)
    {
        throw new Exception('Config is singleton - it cannot be unserialized');
    }
}
