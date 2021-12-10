<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\EmailModule;

class CloudApiSender
{
    private CloudClientInterface $cloudClient;

    public function __construct(CloudClientInterface $cloudClient)
    {
        $this->cloudClient = $cloudClient;
    }

    /** @throws UserNotFoundException */
    public function send(string $email): string
    {
        if (!$this->cloudClient->hasAccount($email)) {
            throw new UserNotFoundException();
        }

        return sprintf('Email (Cloud): %s', $email);
    }
}
