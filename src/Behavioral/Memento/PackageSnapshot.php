<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Memento;

final class PackageSnapshot
{
    public function __construct(
        public readonly float $width,
        public readonly float $height,
        public readonly float $length,
        public readonly float $weight
    ) {}
}
