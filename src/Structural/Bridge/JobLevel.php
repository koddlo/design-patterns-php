<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

interface JobLevel
{
    public const MAX_AUTHORITY = 10;

    public function getAuthorityFactor(): float;
}
