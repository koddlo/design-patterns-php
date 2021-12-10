<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\EmailModule;

class SmtpSender
{
    public function send(string $email): string
    {
        return sprintf('Email (SMTP): %s', $email);
    }
}
