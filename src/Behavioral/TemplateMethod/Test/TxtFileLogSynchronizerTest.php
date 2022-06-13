<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\TxtFileLogSynchronizer;
use PHPUnit\Framework\TestCase;

final class TxtFileLogSynchronizerTest extends TestCase
{
    public function testCanSynchronizeLogsFromTestFile(): void
    {
        $logSynchronizer = new TxtFileLogSynchronizer(new FakeLogRepository());

        try {
            $logSynchronizer->synchronize('test_logs.txt');
        } catch (\BadMethodCallException $exception) {
            self::fail('Synchronize action using test_logs.txt does not work.');
        }

        self::assertTrue(true);
    }
}
