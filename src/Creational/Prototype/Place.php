<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype;

final class Place
{
    private string $id;

    private ?Event $event = null;

    public function __construct()
    {
        $this->id = uniqid();
    }

    public function setEvent(?Event $event): void
    {
        $this->event = $event;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }
}
