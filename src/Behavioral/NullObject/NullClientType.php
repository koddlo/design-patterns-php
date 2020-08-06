<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

class NullClientType implements ClientTypeInterface
{
    public function getLevel(): int
    {
        return 0;
    }
}
