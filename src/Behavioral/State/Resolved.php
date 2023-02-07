<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

final class Resolved implements StateInterface
{
    public function move(State $state): StateInterface
    {
        return match ($state) {
            State::CLOSED => new Closed(),
            State::IN_PROGRESS => new InProgress(),
            default => throw new InvalidStateException()
        };
    }

    public function canEstimate(): bool
    {
        return false;
    }
}
