<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory\Test;

use DesignPatterns\Creational\SimpleFactory\VegetarianMeal;
use DesignPatterns\Creational\SimpleFactory\VeganMeal;
use DesignPatterns\Creational\SimpleFactory\MealFactory;
use DesignPatterns\Creational\SimpleFactory\MealInterface;
use DesignPatterns\Creational\SimpleFactory\MealType;
use PHPUnit\Framework\TestCase;

final class MealFactoryTest extends TestCase
{
    public function testCanCreateVegetarianMeal(): void
    {
        $mealType = new MealType(MealType::TYPE_VEGETARIAN);
        $meal = (new MealFactory())->create($mealType);

        $this->assertInstanceOf(MealInterface::class, $meal);
        $this->assertInstanceOf(VegetarianMeal::class, $meal);
    }

    public function testCanCreateVeganMeal(): void
    {
        $mealType = new MealType(MealType::TYPE_VEGAN);
        $meal = (new MealFactory())->create($mealType);

        $this->assertInstanceOf(MealInterface::class, $meal);
        $this->assertInstanceOf(VeganMeal::class, $meal);
    }

    public function testCannotCreateMealOfNonExistentType(): void
    {
        $mealType = new MealType('Paleo');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('That type of meal does not exist');

        (new MealFactory())->create($mealType);
    }
}
