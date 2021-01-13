<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

class Accommodation extends AbstractOptionDecorator
{
    public const PRICE = 180.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
