<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

interface JobLevelInterface
{
    public const int MAX_AUTHORITY = 10;

    public function getAuthorityFactor(): float;
}
