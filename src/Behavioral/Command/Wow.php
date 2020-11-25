<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class Wow implements Command
{
    private Author $author;

    private Interactive $interactive;

    public function __construct(Author $author, Interactive $interactive)
    {
        $this->author = $author;
        $this->interactive = $interactive;
    }

    public function execute(): void
    {
        $this->interactive->wow($this->author->getId());
    }
}
