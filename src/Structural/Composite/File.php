<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite;

class File implements FileSystemElementInterface
{
    private string $id;

    private int $size;

    public function __construct(int $size)
    {
        $this->id = uniqid();
        $this->size = $size;
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
