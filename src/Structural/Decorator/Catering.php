<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

class Catering extends OptionDecorator
{
    public const PRICE = 45.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
