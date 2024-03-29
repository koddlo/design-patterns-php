<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\VegetarianMeal;
use DesignPatterns\Creational\FactoryMethod\VegetarianMealFactory;
use DesignPatterns\Creational\FactoryMethod\MealInterface;
use PHPUnit\Framework\TestCase;

final class VegetarianMealFactoryTest extends TestCase
{
    public function testCanCreateVegetarianMeal(): void
    {
        $meal = (new VegetarianMealFactory())->createMeal();

        self::assertInstanceOf(MealInterface::class, $meal);
        self::assertInstanceOf(VegetarianMeal::class, $meal);
    }
}
