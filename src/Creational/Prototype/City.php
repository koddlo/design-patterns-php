<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype;

final class City
{
    private string $id;

    public function __construct()
    {
        $this->id = uniqid();
    }
}
