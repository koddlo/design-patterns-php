<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\VeganMeal;
use DesignPatterns\Creational\FactoryMethod\VeganMealFactory;
use DesignPatterns\Creational\FactoryMethod\MealInterface;
use PHPUnit\Framework\TestCase;

final class VeganMealFactoryTest extends TestCase
{
    public function testCanCreateVeganMeal(): void
    {
        $meal = (new VeganMealFactory())->createMeal();

        self::assertInstanceOf(MealInterface::class, $meal);
        self::assertInstanceOf(VeganMeal::class, $meal);
    }
}
