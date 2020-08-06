<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

class VeganMeal implements MealInterface
{
    public function containsAnimalProducts(): bool
    {
        return false;
    }
}
