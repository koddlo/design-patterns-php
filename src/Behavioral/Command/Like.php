<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Command;

class Like implements CommandInterface
{
    private Author $author;

    private InteractiveInterface $interactive;

    public function __construct(Author $author, InteractiveInterface $interactive)
    {
        $this->author = $author;
        $this->interactive = $interactive;
    }

    public function execute(): void
    {
        $this->interactive->like($this->author->getId());
    }
}
