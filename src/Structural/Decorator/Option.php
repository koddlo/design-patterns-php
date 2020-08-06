<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

interface Option
{
    public function calculatePrice(): float;
}
