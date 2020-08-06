<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

class MealFactory
{
    public function create(MealType $mealType): MealInterface
    {
        switch ($mealType->getName()) {
            case MealType::TYPE_VEGETARIAN:
                return new VegetarianMeal();
            case MealType::TYPE_VEGAN:
                return new VeganMeal();
            default:
                throw new \InvalidArgumentException('That type of meal does not exist');
        }
    }
}
