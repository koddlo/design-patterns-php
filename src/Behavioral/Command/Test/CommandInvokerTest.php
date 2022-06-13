<?php

declare(strict_types=1);

namespace Behavioral\Command\Test;

use DesignPatterns\Behavioral\Command\CommandInterface;
use DesignPatterns\Behavioral\Command\CommandInvoker;
use PHPUnit\Framework\TestCase;

final class CommandInvokerTest extends TestCase
{
    public function testCanInvokeCommand(): void
    {
        $command = $this->createMock(CommandInterface::class);
        $invoker = new CommandInvoker();
        $invoker->setCommand($command);

        $command
            ->expects($this->once())
            ->method('execute');

        $invoker->invoke();
    }
}
