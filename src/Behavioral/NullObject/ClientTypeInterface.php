<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

interface ClientTypeInterface
{
    public const LEVEL_0 = 0;
    public const LEVEL_1 = 1;
    public const LEVEL_2 = 2;
    public const LEVEL_3 = 3;

    public function getLevel(): int;
}
