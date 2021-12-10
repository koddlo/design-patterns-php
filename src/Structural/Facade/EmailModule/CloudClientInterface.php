<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\EmailModule;

interface CloudClientInterface
{
    public function hasAccount(string $email): bool;
}
