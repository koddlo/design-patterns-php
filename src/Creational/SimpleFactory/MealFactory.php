<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

use InvalidArgumentException;

final class MealFactory
{
    public function create(MealType $mealType): MealInterface
    {
        return match ($mealType->name) {
            MealType::TYPE_VEGETARIAN => new VegetarianMeal(),
            MealType::TYPE_VEGAN => new VeganMeal(),
            default => throw new InvalidArgumentException('The type of meal does not exist'),
        };
    }
}
