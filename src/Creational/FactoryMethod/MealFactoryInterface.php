<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

interface MealFactoryInterface
{
    public function createMeal(): MealInterface;
}
