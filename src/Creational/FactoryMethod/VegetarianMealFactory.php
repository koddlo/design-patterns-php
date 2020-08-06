<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VegetarianMealFactory extends MealFactory
{
    public function createMeal(): MealInterface
    {
        return new VegetarianMeal();
    }
}
