<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

final class Reopened implements StateInterface
{
    public function move(State $state): StateInterface
    {
        return match ($state) {
            State::IN_PROGRESS => new InProgress(),
            State::CLOSED => new Closed(),
            default => throw new InvalidStateException()
        };
    }

    public function canEstimate(): bool
    {
        return true;
    }
}
