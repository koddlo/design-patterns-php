<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class CommandInvoker
{
    private Command $command;

    public function setCommand(Command $command): void
    {
        $this->command = $command;
    }

    public function invoke(): void
    {
        $this->command->execute();
    }
}
