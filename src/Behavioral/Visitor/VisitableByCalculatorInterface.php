<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

interface VisitableByCalculatorInterface
{
    public function calculatePrice(PriceCalculatorInterface $visitor): float;
}
