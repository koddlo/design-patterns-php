<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

final class Sponsor implements VisitableByCalculatorInterface
{
    public function __construct(
        private Status $status,
        private bool $withExhibition
    ) {}

    public function calculatePrice(PriceCalculatorInterface $visitor): float
    {
        return $visitor->calculateForSponsor($this);
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function withExhibition(): bool
    {
        return $this->withExhibition;
    }
}
