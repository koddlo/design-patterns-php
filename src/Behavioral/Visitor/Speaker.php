<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

final class Speaker implements VisitableByCalculatorInterface
{
    public function calculatePrice(PriceCalculatorInterface $visitor): float
    {
        return $visitor->calculateForSpeaker($this);
    }
}
