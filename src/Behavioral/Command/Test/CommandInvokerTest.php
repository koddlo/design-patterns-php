<?php

declare(strict_types=1);

namespace Behavioral\Command\Test;

use DesignPatterns\Behavioral\Command\CommandInterface;
use DesignPatterns\Behavioral\Command\CommandInvoker;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

final class CommandInvokerTest extends TestCase
{
    use ProphecyTrait;

    public function testCanInvokeCommand(): void
    {
        $command = $this->prophesize(CommandInterface::class);
        $command
            ->execute()
            ->shouldBeCalled();

        $invoker = new CommandInvoker();
        $invoker->setCommand($command->reveal());
        $invoker->invoke();
    }
}
