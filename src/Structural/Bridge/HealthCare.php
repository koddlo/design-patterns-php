<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

class HealthCare extends Benefit
{
    private const MAX_GRANT = 1200;

    public function calculateGrant(): float
    {
        return $this->level->getAuthorityFactor() * self::MAX_GRANT;
    }
}
