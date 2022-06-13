<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\SmsModule;

final class SmsNotifier
{
    public function notify(string $phoneNumber): string
    {
        return sprintf('SMS: %s', $phoneNumber);
    }
}
