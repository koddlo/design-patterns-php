<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod;

interface MealInterface
{
    public function containsAnimalProducts(): bool;

    public function containsVegetables(): bool;
}
