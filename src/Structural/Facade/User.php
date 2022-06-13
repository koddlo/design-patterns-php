<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade;

final class User
{
    private ?string $phoneNumber = null;

    public function __construct(
        private string $email
    ) {}

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
