<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter\Test;

use DesignPatterns\Structural\Adapter\ExternalLogger;
use DesignPatterns\Structural\Adapter\LogAdapter;
use DesignPatterns\Structural\Adapter\Logger;
use PHPUnit\Framework\TestCase;

class LogAdapterTest extends TestCase
{
    public function testLogAdapterImplementsLogInterface(): void
    {
        $externalLogger = $this->prophesize(ExternalLogger::class);
        $logAdapter = new LogAdapter($externalLogger->reveal());

        $this->assertInstanceOf(Logger::class, $logAdapter);
    }

    public function testCanLogIntoFile(): void
    {
        $message = 'Test log message';

        $externalLogger = $this->prophesize(ExternalLogger::class);
        $externalLogger
            ->saveLogIntoFile($message)
            ->shouldBeCalledOnce();

        $logAdapter = new LogAdapter($externalLogger->reveal());
        $logAdapter->log($message);
    }
}
