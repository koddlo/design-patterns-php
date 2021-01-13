<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

class EmailNotifier implements NotifyInterface
{
    public function notify(string $message): string
    {
        return sprintf('Email: %s', $message);
    }
}
