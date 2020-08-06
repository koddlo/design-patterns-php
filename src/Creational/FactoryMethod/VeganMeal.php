<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VeganMeal implements MealInterface
{
    public function containsAnimalProducts(): bool
    {
        return false;
    }

    public function containsVegetables(): bool
    {
        return true;
    }
}
