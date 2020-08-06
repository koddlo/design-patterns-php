<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\Breakfast;
use DesignPatterns\Creational\AbstractFactory\Dinner;
use DesignPatterns\Creational\AbstractFactory\MealFactory;
use DesignPatterns\Creational\AbstractFactory\VeganBreakfast;
use DesignPatterns\Creational\AbstractFactory\VeganDinner;
use DesignPatterns\Creational\AbstractFactory\VeganMealFactory;
use PHPUnit\Framework\TestCase;

class VeganMealFactoryTest extends TestCase
{
    private MealFactory $veganMealFactory;

    protected function setUp(): void
    {
        $this->veganMealFactory = new VeganMealFactory();
    }

    public function testCanCreateVeganBreakfast(): void
    {
        $meal = $this->veganMealFactory->createBreakfast();

        $this->assertInstanceOf(VeganBreakfast::class, $meal);
        $this->assertInstanceOf(Breakfast::class, $meal);
    }

    public function testCanCreateVeganDinner(): void
    {
        $meal = $this->veganMealFactory->createDinner();

        $this->assertInstanceOf(VeganDinner::class, $meal);
        $this->assertInstanceOf(Dinner::class, $meal);
    }
}
