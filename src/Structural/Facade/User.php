<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade;

class User
{
    private string $email;

    private ?string $phoneNumber = null;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function hasPhoneNumber(): bool
    {
        return $this->phoneNumber !== null;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }
}
