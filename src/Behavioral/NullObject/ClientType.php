<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

class ClientType implements ClientTypeInterface
{
    private int $level;

    public function __construct(int $level)
    {
        $this->level = in_array($level, [0, 1, 2, 3]) ? $level : 1;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
