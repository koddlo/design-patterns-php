<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

class CsvFileLogSynchronizer extends FileLogSynchronizer
{
    public function __construct(LogRepository $logRepository)
    {
        parent::__construct($logRepository);
    }

    protected function readFromFile(string $filePath): array
    {
        $unprocessedLogs = [];
        $file = fopen($filePath, 'r');
        while (($unprocessedLog = fgetcsv($file, 0, ':')) !== false) {
            $unprocessedLogs[] = $unprocessedLog;
        }

        fclose($file);

        return $unprocessedLogs;
    }

    protected function transform(array $unprocessedLogs): array
    {
        $logs = [];
        foreach ($unprocessedLogs as $unprocessedLog) {
            $logDate = \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', reset($unprocessedLog));

            if ($logDate === false) {
                continue;
            }

            $logs[] = new Log($logDate, end($unprocessedLog));
        }

        return $logs;
    }
}
