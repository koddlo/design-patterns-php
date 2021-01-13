<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

class VegetarianMealFactory extends AbstractMealFactory
{
    public function createBreakfast(): BreakfastInterface
    {
        return new VegetarianBreakfast();
    }

    public function createDinner(): DinnerInterface
    {
        return new VegetarianDinner();
    }
}
