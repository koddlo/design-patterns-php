<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

interface Command
{
    public function execute(): void;
}
