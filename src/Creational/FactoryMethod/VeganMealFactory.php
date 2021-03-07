<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VeganMealFactory implements MealFactoryInterface
{
    public function createMeal(): MealInterface
    {
        return new VeganMeal();
    }
}
