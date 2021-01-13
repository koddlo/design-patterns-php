<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class CommandInvoker
{
    private CommandInterface $command;

    public function setCommand(CommandInterface $command): void
    {
        $this->command = $command;
    }

    public function invoke(): void
    {
        $this->command->execute();
    }
}
