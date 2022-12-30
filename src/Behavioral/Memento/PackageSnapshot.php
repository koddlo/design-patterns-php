<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Memento;

final readonly class PackageSnapshot
{
    public function __construct(
        public float $width,
        public float $height,
        public float $length,
        public float $weight
    ) {}
}
