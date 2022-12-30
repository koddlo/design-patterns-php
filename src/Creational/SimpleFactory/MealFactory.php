<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

final class MealFactory
{
    public function create(MealType $mealType): MealInterface
    {
        return match ($mealType) {
            MealType::VEGETARIAN => new VegetarianMeal(),
            MealType::VEGAN => new VeganMeal()
        };
    }
}
