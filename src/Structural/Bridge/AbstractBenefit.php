<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

abstract class AbstractBenefit
{
    public function __construct(
        protected JobLevelInterface $level
    ) {}

    abstract public function calculateGrant(): float;
}
