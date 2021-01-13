<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\BreakfastInterface;
use DesignPatterns\Creational\AbstractFactory\DinnerInterface;
use DesignPatterns\Creational\AbstractFactory\AbstractMealFactory;
use DesignPatterns\Creational\AbstractFactory\VegetarianBreakfast;
use DesignPatterns\Creational\AbstractFactory\VegetarianDinner;
use DesignPatterns\Creational\AbstractFactory\VegetarianMealFactory;
use PHPUnit\Framework\TestCase;

class VegetarianMealFactoryTest extends TestCase
{
    private AbstractMealFactory $vegetarianMealFactory;

    protected function setUp(): void
    {
        $this->vegetarianMealFactory = new VegetarianMealFactory();
    }

    public function testCanCreateVegetarianBreakfast(): void
    {
        $meal = $this->vegetarianMealFactory->createBreakfast();

        $this->assertInstanceOf(VegetarianBreakfast::class, $meal);
        $this->assertInstanceOf(BreakfastInterface::class, $meal);
    }

    public function testCanCreateVegetarianDinner(): void
    {
        $meal = $this->vegetarianMealFactory->createDinner();

        $this->assertInstanceOf(VegetarianDinner::class, $meal);
        $this->assertInstanceOf(DinnerInterface::class, $meal);
    }
}
