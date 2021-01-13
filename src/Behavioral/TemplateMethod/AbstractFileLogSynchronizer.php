<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

abstract class AbstractFileLogSynchronizer
{
    private const FILE_PATH = __DIR__ . '/synchronization/files/';

    protected LogRepositoryInterface $logRepository;

    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    final public function synchronize(string $fileName): void
    {
        $unprocessedLogs = $this->readFromFile(
            $this->getFilePath($fileName)
        );
        $logs = $this->transform($unprocessedLogs);
        $this->logRepository->save($logs);
    }

    abstract protected function readFromFile(string $filePath): array;

    abstract protected function transform(array $unprocessedLogs): array;

    private function getFilePath(string $fileName): string
    {
        return self::FILE_PATH . $fileName;
    }
}
