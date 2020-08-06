<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\VeganMeal;
use DesignPatterns\Creational\FactoryMethod\VeganMealFactory;
use DesignPatterns\Creational\FactoryMethod\MealFactory;
use DesignPatterns\Creational\FactoryMethod\MealInterface;
use PHPUnit\Framework\TestCase;

class VeganMealFactoryTest extends TestCase
{
    private MealFactory $veganMealFactory;

    protected function setUp(): void
    {
        $this->veganMealFactory = new VeganMealFactory();
    }

    public function testCanCreateVeganMeal(): void
    {
        $meal = $this->veganMealFactory->createMeal();

        $this->assertInstanceOf(MealInterface::class, $meal);
        $this->assertInstanceOf(VeganMeal::class, $meal);
    }

    public function testIsVeganMealYummy(): void
    {
        $this->assertFalse($this->veganMealFactory->isYummy());
    }
}
