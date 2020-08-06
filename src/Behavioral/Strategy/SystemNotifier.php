<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

class SystemNotifier implements NotifyStrategy
{
    public function notify(string $message): string
    {
        return sprintf('System: %s', $message);
    }
}
