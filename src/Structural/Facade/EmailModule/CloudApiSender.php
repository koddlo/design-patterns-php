<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\EmailModule;

final class CloudApiSender
{
    public function __construct(
        private CloudClientInterface $cloudClient
    ) {}

    /** @throws UserNotFoundException */
    public function send(string $email): string
    {
        if (!$this->cloudClient->hasAccount($email)) {
            throw new UserNotFoundException();
        }

        return sprintf('Email (Cloud): %s', $email);
    }
}
