<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Decorator;

interface OptionInterface
{
    public function calculatePrice(): float;
}
