<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

final class LogAdapter implements LoggerInterface
{
    public function __construct(
        private ExternalLogger $logger
    ) {}

    public function log(string $logMessage): void
    {
        $this->logger->saveLogIntoFile($logMessage);
    }
}
