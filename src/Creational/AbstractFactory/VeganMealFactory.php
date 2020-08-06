<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VeganMealFactory extends MealFactory
{
    public function createBreakfast(): Breakfast
    {
        return new VeganBreakfast();
    }

    public function createDinner(): Dinner
    {
        return new VeganDinner();
    }
}
