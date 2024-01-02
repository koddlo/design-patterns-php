<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

final class Catering extends AbstractOptionDecorator
{
    public const float PRICE = 45.00;

    public function calculatePrice(): float
    {
        return $this->option->calculatePrice() + self::PRICE;
    }
}
