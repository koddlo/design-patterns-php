<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VegetarianDinner implements DinnerInterface
{
    public function canBePackedInGlassContainer(): bool
    {
        return true;
    }
}
