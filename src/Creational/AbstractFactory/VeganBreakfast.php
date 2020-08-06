<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VeganBreakfast implements Breakfast
{
    public function shouldAddVitaminB12Supplement(): bool
    {
        return true;
    }
}
