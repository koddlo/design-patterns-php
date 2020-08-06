<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

interface Breakfast
{
    public function shouldAddVitaminB12Supplement(): bool;
}
