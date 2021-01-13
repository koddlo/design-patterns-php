<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

abstract class AbstractBenefit
{
    protected JobLevelInterface $level;

    public function __construct(JobLevelInterface $level)
    {
        $this->level = $level;
    }

    abstract public function calculateGrant(): float;
}
