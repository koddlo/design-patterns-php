<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

final class Senior implements JobLevelInterface
{
    private const AUTHORITY = 7;

    public function getAuthorityFactor(): float
    {
        return self::AUTHORITY / self::MAX_AUTHORITY;
    }
}
