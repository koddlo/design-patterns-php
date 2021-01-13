<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

interface CommandInterface
{
    public function execute(): void;
}
