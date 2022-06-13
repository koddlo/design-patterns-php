<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

final class VeganMealFactory extends AbstractMealFactory
{
    public function createBreakfast(): BreakfastInterface
    {
        return new VeganBreakfast();
    }

    public function createDinner(): DinnerInterface
    {
        return new VeganDinner();
    }
}
