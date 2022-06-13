<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\BreakfastInterface;
use DesignPatterns\Creational\AbstractFactory\DinnerInterface;
use DesignPatterns\Creational\AbstractFactory\VegetarianBreakfast;
use DesignPatterns\Creational\AbstractFactory\VegetarianDinner;
use DesignPatterns\Creational\AbstractFactory\VegetarianMealFactory;
use PHPUnit\Framework\TestCase;

final class VegetarianMealFactoryTest extends TestCase
{
    public function testCanCreateVegetarianBreakfast(): void
    {
        $meal = (new VegetarianMealFactory())->createBreakfast();

        self::assertInstanceOf(VegetarianBreakfast::class, $meal);
        self::assertInstanceOf(BreakfastInterface::class, $meal);
    }

    public function testCanCreateVegetarianDinner(): void
    {
        $meal = (new VegetarianMealFactory())->createDinner();

        self::assertInstanceOf(VegetarianDinner::class, $meal);
        self::assertInstanceOf(DinnerInterface::class, $meal);
    }
}
