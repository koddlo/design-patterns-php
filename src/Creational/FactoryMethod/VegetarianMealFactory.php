<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

class VegetarianMealFactory extends AbstractMealFactory
{
    public function createMeal(): MealInterface
    {
        return new VegetarianMeal();
    }
}
