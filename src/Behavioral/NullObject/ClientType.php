<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

final class ClientType implements ClientTypeInterface
{
    public function __construct(
        private int $level
    ) {
        $this->level = in_array($level, [self::LEVEL_0, self::LEVEL_1, self::LEVEL_2, self::LEVEL_3]) ? $level : 1;
    }

    public function getLevel(): int
    {
        return $this->level;
    }
}
