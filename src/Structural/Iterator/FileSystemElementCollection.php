<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Iterator;

use Iterator;

final class FileSystemElementCollection implements Iterator
{
    private array $elements = [];

    public function add(FileSystemElementInterface $element): void
    {
        $this->elements[$element->getId()] = $element;
    }

    public function current(): ?FileSystemElementInterface
    {
        return current($this->elements) ?: null;
    }

    public function next(): void
    {
        next($this->elements);
    }

    public function key(): ?string
    {
        return key($this->elements);
    }

    public function valid(): bool
    {
        return null !== $this->key();
    }

    public function rewind(): void
    {
        reset($this->elements);
    }
}
