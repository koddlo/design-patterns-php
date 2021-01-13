<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\CsvFileLogSynchronizer;
use PHPUnit\Framework\TestCase;

final class CsvFileLogSynchronizerTest extends TestCase
{
    public function testCanSynchronizeLogsFromTestFile(): void
    {
        $logSynchronizer = new CsvFileLogSynchronizer(new FakeLogRepository());

        try {
            $logSynchronizer->synchronize('test_logs.csv');
        } catch (\BadMethodCallException $exception) {
            $this->assertFalse(true, 'Synchronize action using test_logs.csv does not work.');
        }

        $this->assertTrue(true);
    }
}
