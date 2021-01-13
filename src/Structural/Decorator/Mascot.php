<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

class Mascot extends AbstractOptionDecorator
{
    public const PRICE = 30.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
