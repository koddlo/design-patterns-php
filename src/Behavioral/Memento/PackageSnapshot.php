<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Memento;

class PackageSnapshot
{
    private float $width;

    private float $height;

    private float $length;

    private float $weight;

    public function __construct(
        float $width,
        float $height,
        float $length,
        float $weight
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->length = $length;
        $this->weight = $weight;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
}
