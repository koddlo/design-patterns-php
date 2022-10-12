<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

final class Participant implements VisitableByCalculatorInterface
{
    public function __construct(
        private bool $isVIP
    ) {}

    public function calculatePrice(PriceCalculatorInterface $visitor): float
    {
        return $visitor->calculateForParticipant($this);
    }

    public function getPercentDiscount(): int
    {
        return $this->isVIP ? 10 : 0;
    }
}
