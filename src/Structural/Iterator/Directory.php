<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Iterator;

class Directory implements FileSystemElementInterface
{
    private string $id;

    private FileSystemElementCollection $elements;

    public function __construct()
    {
        $this->id = uniqid();
        $this->elements = new FileSystemElementCollection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSize(): int
    {
        $size = 0;
        foreach ($this->elements as $element) {
            $size += $element->getSize();
        }

        return $size;
    }

    public function addElement(FileSystemElementInterface $element): void
    {
        $this->elements->add($element);
    }
}
