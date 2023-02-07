<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

interface StateInterface
{
    /**
     * @throws InvalidStateException
     */
    public function move(State $state): self;

    public function canEstimate(): bool;
}
