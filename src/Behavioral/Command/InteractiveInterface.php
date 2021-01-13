<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

interface InteractiveInterface
{
    public function like(string $authorId): void;

    public function wow(string $authorId): void;
}
