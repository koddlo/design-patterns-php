<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

class EmailNotifier implements NotifyStrategy
{
    public function notify(string $message): string
    {
        return sprintf('Email: %s', $message);
    }
}
