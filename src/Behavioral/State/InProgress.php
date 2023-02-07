<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

final class InProgress implements StateInterface
{
    public function move(State $state): StateInterface
    {
        return match ($state) {
            State::RESOLVED => new Resolved(),
            State::OPEN => new Open(),
            default => throw new InvalidStateException()
        };
    }

    public function canEstimate(): bool
    {
        return false;
    }
}
