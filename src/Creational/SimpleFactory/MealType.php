<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

enum MealType: string
{
    case VEGETARIAN = 'vegetarian';
    case VEGAN = 'vegan';
}
