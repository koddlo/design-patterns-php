<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

final class Ticket implements OptionInterface
{
    public function calculatePrice(): float
    {
        return 100.00;
    }
}
