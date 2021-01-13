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

        $this->assertInstanceOf(VegetarianBreakfast::class, $meal);
        $this->assertInstanceOf(BreakfastInterface::class, $meal);
    }

    public function testCanCreateVegetarianDinner(): void
    {
        $meal = (new VegetarianMealFactory())->createDinner();

        $this->assertInstanceOf(VegetarianDinner::class, $meal);
        $this->assertInstanceOf(DinnerInterface::class, $meal);
    }
}
