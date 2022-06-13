<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\EmailModule;

final class SmtpSender
{
    public function send(string $email): string
    {
        return sprintf('Email (SMTP): %s', $email);
    }
}
