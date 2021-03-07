<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VegetarianMealFactory implements MealFactoryInterface
{
    public function createMeal(): MealInterface
    {
        return new VegetarianMeal();
    }
}
