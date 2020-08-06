<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VegetarianBreakfast implements Breakfast
{
    public function shouldAddVitaminB12Supplement(): bool
    {
        return false;
    }
}
