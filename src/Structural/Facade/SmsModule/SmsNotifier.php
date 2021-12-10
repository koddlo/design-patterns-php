<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\SmsModule;

class SmsNotifier
{
    public function notify(string $phoneNumber): string
    {
        return sprintf('SMS: %s', $phoneNumber);
    }
}
