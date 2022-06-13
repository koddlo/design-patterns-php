<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite;

final class Directory implements FileSystemElementInterface
{
    private string $id;

    private array $elements;

    public function __construct()
    {
        $this->id = uniqid();
        $this->elements = [];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSize(): int
    {
        $size = 0;
        /** @var FileSystemElementInterface $element */
        foreach ($this->elements as $element) {
            $size += $element->getSize();
        }

        return $size;
    }

    public function addElement(FileSystemElementInterface $element): void
    {
        $this->elements[$element->getId()] = $element;
    }
}
