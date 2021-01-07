<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\TxtFileLogSynchronizer;
use PHPUnit\Framework\TestCase;

class TxtFileLogSynchronizerTest extends TestCase
{
    public function testCanSynchronizeLogsFromTestFile(): void
    {
        $logSynchronizer = new TxtFileLogSynchronizer(new FakeLogRepository());

        try {
            $logSynchronizer->synchronize('test_logs.txt');
        } catch (\BadMethodCallException $exception) {
            $this->assertFalse(true, 'Synchronize action using test_logs.txt does not work.');
        }

        $this->assertTrue(true);
    }
}
