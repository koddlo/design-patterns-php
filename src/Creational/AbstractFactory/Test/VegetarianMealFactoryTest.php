<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\Breakfast;
use DesignPatterns\Creational\AbstractFactory\Dinner;
use DesignPatterns\Creational\AbstractFactory\MealFactory;
use DesignPatterns\Creational\AbstractFactory\VegetarianBreakfast;
use DesignPatterns\Creational\AbstractFactory\VegetarianDinner;
use DesignPatterns\Creational\AbstractFactory\VegetarianMealFactory;
use PHPUnit\Framework\TestCase;

class VegetarianMealFactoryTest extends TestCase
{
    private MealFactory $vegetarianMealFactory;

    protected function setUp(): void
    {
        $this->vegetarianMealFactory = new VegetarianMealFactory();
    }

    public function testCanCreateVegetarianBreakfast(): void
    {
        $meal = $this->vegetarianMealFactory->createBreakfast();

        $this->assertInstanceOf(VegetarianBreakfast::class, $meal);
        $this->assertInstanceOf(Breakfast::class, $meal);
    }

    public function testCanCreateVegetarianDinner(): void
    {
        $meal = $this->vegetarianMealFactory->createDinner();

        $this->assertInstanceOf(VegetarianDinner::class, $meal);
        $this->assertInstanceOf(Dinner::class, $meal);
    }
}
