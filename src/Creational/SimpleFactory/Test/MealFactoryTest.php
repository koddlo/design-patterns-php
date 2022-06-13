<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory\Test;

use DesignPatterns\Creational\SimpleFactory\VegetarianMeal;
use DesignPatterns\Creational\SimpleFactory\VeganMeal;
use DesignPatterns\Creational\SimpleFactory\MealFactory;
use DesignPatterns\Creational\SimpleFactory\MealInterface;
use DesignPatterns\Creational\SimpleFactory\MealType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class MealFactoryTest extends TestCase
{
    public function testCanCreateVegetarianMeal(): void
    {
        $mealType = new MealType(MealType::TYPE_VEGETARIAN);

        $meal = (new MealFactory())->create($mealType);

        self::assertInstanceOf(MealInterface::class, $meal);
        self::assertInstanceOf(VegetarianMeal::class, $meal);
    }

    public function testCanCreateVeganMeal(): void
    {
        $mealType = new MealType(MealType::TYPE_VEGAN);

        $meal = (new MealFactory())->create($mealType);

        self::assertInstanceOf(MealInterface::class, $meal);
        self::assertInstanceOf(VeganMeal::class, $meal);
    }

    public function testCannotCreateMealOfNonExistentType(): void
    {
        $mealType = new MealType('Paleo');

        self::expectException(InvalidArgumentException::class);

        (new MealFactory())->create($mealType);
    }
}
