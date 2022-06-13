<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Memento;

final class Package
{
    private const SMALL_WIDTH = 8.00;
    private const SMALL_HEIGHT = 38.00;
    private const SMALL_LENGTH = 68.00;
    private const SMALL_WEIGHT = 25.00;

    public function __construct(
        private float $width,
        private float $height,
        private float $length,
        private float $weight
    ) {}

    public function isSmall(): bool
    {
        return $this->height <= self::SMALL_HEIGHT
            && $this->width <= self::SMALL_WIDTH
            && $this->length <= self::SMALL_LENGTH
            && $this->weight <= self::SMALL_WEIGHT;
    }

    public function increaseWeight(float $weight): void
    {
        $this->weight += $weight;
    }

    public function snapshot(): PackageSnapshot
    {
        return new PackageSnapshot(
            $this->width,
            $this->height,
            $this->length,
            $this->weight
        );
    }

    public static function restore(PackageSnapshot $snapshot): self
    {
        return new self(
            $snapshot->width,
            $snapshot->height,
            $snapshot->length,
            $snapshot->weight
        );
    }
}
