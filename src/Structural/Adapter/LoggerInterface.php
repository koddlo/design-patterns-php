<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

interface LoggerInterface
{
    public function log(string $logMessage): void;
}
