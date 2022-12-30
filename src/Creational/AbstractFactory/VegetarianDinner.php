<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

final class VegetarianDinner implements DinnerInterface
{
    public function canBePackedInGlassContainer(): true
    {
        return true;
    }
}
