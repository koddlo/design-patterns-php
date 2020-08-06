<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

class NotificationPreference
{
    private bool $email;

    private bool $system;

    public function __construct(bool $email, bool $system)
    {
        $this->email = $email;
        $this->system = $system;
    }

    public function shouldNotifyByEmail(): bool
    {
        return $this->email;
    }

    public function shouldNotifyBySystem(): bool
    {
        return $this->system;
    }
}
