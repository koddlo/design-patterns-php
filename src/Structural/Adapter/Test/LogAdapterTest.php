<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter\Test;

use DesignPatterns\Structural\Adapter\ExternalLogger;
use DesignPatterns\Structural\Adapter\LogAdapter;
use DesignPatterns\Structural\Adapter\LoggerInterface;
use PHPUnit\Framework\TestCase;

final class LogAdapterTest extends TestCase
{
    public function testLogAdapterImplementsLogInterface(): void
    {
        $logAdapter = new LogAdapter(new ExternalLogger());

        self::assertInstanceOf(LoggerInterface::class, $logAdapter);
    }

    public function testCanLogIntoFile(): void
    {
        $message = 'Test log message';
        $externalLogger = $this->createMock(ExternalLogger::class);
        $logAdapter = new LogAdapter($externalLogger);

        $externalLogger
            ->expects($this->once())
            ->method('saveLogIntoFile')
            ->with($message);

        $logAdapter->log($message);
    }
}
