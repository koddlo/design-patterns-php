<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

class LogAdapter implements Logger
{
    private ExternalLogger $logger;

    public function __construct(ExternalLogger $logger)
    {
        $this->logger = $logger;
    }

    public function log(string $logMessage): void
    {
        $this->logger->saveLogIntoFile($logMessage);
    }
}
