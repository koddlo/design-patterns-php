<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

final class Wow implements CommandInterface
{
    public function __construct(
        private Author $author,
        private InteractiveInterface $interactive
    ) {}

    public function execute(): void
    {
        $this->interactive->wow($this->author->getId());
    }
}
