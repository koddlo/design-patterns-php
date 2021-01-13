<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

class TxtFileLogSynchronizer extends AbstractFileLogSynchronizer
{
    public function __construct(LogRepositoryInterface $logRepository)
    {
        parent::__construct($logRepository);
    }

    protected function readFromFile(string $filePath): array
    {
        $unprocessedLogs = [];
        $rows = explode("\n", file_get_contents($filePath));
        foreach ($rows as $row) {
            $unprocessedLog = explode(", ", $row);
            $unprocessedLogs[] = [
                'date' => $unprocessedLog[array_key_first($unprocessedLog)],
                'message' => $unprocessedLog[array_key_last($unprocessedLog)]
            ];
        }

        return $unprocessedLogs;
    }

    protected function transform(array $unprocessedLogs): array
    {
        $logs = [];
        foreach ($unprocessedLogs as $unprocessedLog) {
            $logDate = \DateTimeImmutable::createFromFormat('d.m.Y H:i', $unprocessedLog['date']);

            if ($logDate === false) {
                continue;
            }

            $logs[] = new Log($logDate, $unprocessedLog['message']);
        }

        return $logs;
    }
}
