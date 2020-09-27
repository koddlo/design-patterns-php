<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

abstract class Benefit
{
    protected JobLevel $level;

    public function __construct(JobLevel $level)
    {
        $this->level = $level;
    }

    abstract public function calculateGrant(): float;
}
