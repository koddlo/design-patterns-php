<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VegetarianMeal implements MealInterface
{
    public function containsAnimalProducts(): bool
    {
        return true;
    }

    public function containsVegetables(): bool
    {
        return true;
    }
}
