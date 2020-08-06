<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

class MealType
{
    public const TYPE_VEGETARIAN = 'vegetarian';
    public const TYPE_VEGAN = 'vegan';

    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
