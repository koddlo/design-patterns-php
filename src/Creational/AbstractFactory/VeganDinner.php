<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VeganDinner implements DinnerInterface
{
    public function canBePackedInGlassContainer(): bool
    {
        return true;
    }
}
