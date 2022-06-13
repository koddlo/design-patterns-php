<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

final class Like implements CommandInterface
{
    public function __construct(
        private Author $author,
        private InteractiveInterface $interactive
    ) {}

    public function execute(): void
    {
        $this->interactive->like($this->author->getId());
    }
}
