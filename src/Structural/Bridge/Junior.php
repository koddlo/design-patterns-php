<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

final class Junior implements JobLevelInterface
{
    private const AUTHORITY = 3;

    public function getAuthorityFactor(): float
    {
        return self::AUTHORITY / self::MAX_AUTHORITY;
    }
}
