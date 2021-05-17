<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Composite;

interface FileSystemElementInterface
{
    public function getId(): string;

    public function getSize(): int;
}
