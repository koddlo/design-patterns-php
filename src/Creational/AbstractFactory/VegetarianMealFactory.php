<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VegetarianMealFactory extends MealFactory
{
    public function createBreakfast(): Breakfast
    {
        return new VegetarianBreakfast();
    }

    public function createDinner(): Dinner
    {
        return new VegetarianDinner();
    }
}
