<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

abstract class MealFactory
{
    abstract public function createBreakfast(): Breakfast;

    abstract public function createDinner(): Dinner;
}
