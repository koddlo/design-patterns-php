<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

final class VeganBreakfast implements BreakfastInterface
{
    public function shouldAddVitaminB12Supplement(): bool
    {
        return true;
    }
}
