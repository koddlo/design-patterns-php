<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

final class NullClientType implements ClientTypeInterface
{
    public function getLevel(): int
    {
        return self::LEVEL_0;
    }
}
