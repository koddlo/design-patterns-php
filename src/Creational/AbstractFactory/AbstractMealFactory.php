<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

abstract class AbstractMealFactory
{
    abstract public function createBreakfast(): BreakfastInterface;

    abstract public function createDinner(): DinnerInterface;
}
