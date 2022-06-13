<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

final class VeganMeal implements MealInterface
{
    public function containsAnimalProducts(): bool
    {
        return false;
    }
}
