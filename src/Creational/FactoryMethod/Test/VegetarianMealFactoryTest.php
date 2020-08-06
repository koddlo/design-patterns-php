<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\VegetarianMeal;
use DesignPatterns\Creational\FactoryMethod\VegetarianMealFactory;
use DesignPatterns\Creational\FactoryMethod\MealFactory;
use DesignPatterns\Creational\FactoryMethod\MealInterface;
use PHPUnit\Framework\TestCase;

class VegetarianMealFactoryTest extends TestCase
{
    private MealFactory $vegetarianMealFactory;

    protected function setUp(): void
    {
        $this->vegetarianMealFactory = new VegetarianMealFactory();
    }

    public function testCanCreateVegetarianMeal(): void
    {
        $meal = $this->vegetarianMealFactory->createMeal();

        $this->assertInstanceOf(MealInterface::class, $meal);
        $this->assertInstanceOf(VegetarianMeal::class, $meal);
    }

    public function testIsVegetarianMealYummy(): void
    {
        $this->assertTrue($this->vegetarianMealFactory->isYummy());
    }
}
