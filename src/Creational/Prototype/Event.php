<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype;

use DateTimeImmutable;
use DateTimeInterface;

final class Event implements EventPrototypeInterface
{
    private string $id;

    private int $budget = 0;

    private DateTimeImmutable $created;

    private array $invitations;

    public function __construct(
        private City $city,
        private Place $place
    ) {
        $this->id = uniqid();
        $place->setEvent($this);
        $this->created = new DateTimeImmutable();
        $this->invitations = [];
    }

    public function __clone()
    {
        $this->id = uniqid();
        $this->created = new DateTimeImmutable();
        $this->place = clone $this->place;
        $this->place->setEvent($this);
        $this->invitations = [];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function getPlace(): Place
    {
        return $this->place;
    }

    public function getBudget(): int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): Event
    {
        $this->budget = $budget;

        return $this;
    }

    public function getCreated(): DateTimeInterface
    {
        return $this->created;
    }

    public function getInvitations(): array
    {
        return $this->invitations;
    }

    public function addInvitation(Invitation $invitation): Event
    {
        $this->invitations[$invitation->getId()] = $invitation;

        return $this;
    }
}
