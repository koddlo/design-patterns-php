<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class Like implements Command
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
        $this->interactive->like($this->author->getId());
    }
}
