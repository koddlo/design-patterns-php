<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

class Sticker extends AbstractOptionDecorator
{
    public const PRICE = 12.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
