<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite;

final class File implements FileSystemElementInterface
{
    private string $id;

    public function __construct(
        private int $size
    ) {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}
