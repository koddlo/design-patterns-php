<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype;

class Invitation
{
    private string $id;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function getId(): string
    {
        return $this->id;
    }
}
