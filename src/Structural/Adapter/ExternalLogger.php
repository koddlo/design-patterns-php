<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

use DateTimeImmutable;

class ExternalLogger
{
    private const string FILE_DIR = 'data/log/';

    public function saveLogIntoFile(string $log): void
    {
        $logFile = self::FILE_DIR . 'log_' . date('d-M-Y') . '.log';

        file_put_contents($logFile, $this->createLogMessage($log), FILE_APPEND);
    }

    private function createLogMessage(string $message): string
    {
        return sprintf("%s: '%s'\n", (new DateTimeImmutable())->format('H:i'), $message);
    }
}
