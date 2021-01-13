<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

interface NotifyInterface
{
    public function notify(string $message): string;
}
