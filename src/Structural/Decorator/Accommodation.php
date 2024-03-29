<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

final class Accommodation extends AbstractOptionDecorator
{
    public const float PRICE = 180.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
