<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

abstract class MealFactory
{
    abstract public function createMeal(): MealInterface;

    public function isYummy(): bool
    {
        $meal = $this->createMeal();

        return ($meal->containsAnimalProducts() && $meal->containsVegetables());
    }
}
