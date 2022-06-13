<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\SimpleFactory;

final class MealType
{
    public const TYPE_VEGETARIAN = 'vegetarian';
    public const TYPE_VEGAN = 'vegan';

    public function __construct(
        public readonly string $name
    ) {}
}
