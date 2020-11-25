<?php

declare(strict_types=1);

namespace Behavioral\Command\Test;

use DesignPatterns\Behavioral\Command\Command;
use DesignPatterns\Behavioral\Command\CommandInvoker;
use PHPUnit\Framework\TestCase;

class CommandInvokerTest extends TestCase
{
    public function testCanInvokeCommand(): void
    {
        $command = $this->prophesize(Command::class);
        $command
            ->execute()
            ->shouldBeCalled();

        $invoker = new CommandInvoker();
        $invoker->setCommand($command->reveal());
        $invoker->invoke();
    }
}