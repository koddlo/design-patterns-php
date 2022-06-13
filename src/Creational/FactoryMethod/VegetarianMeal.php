<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

final class VegetarianMeal implements MealInterface
{
    public function containsAnimalProducts(): bool
    {
        return true;
    }
}
