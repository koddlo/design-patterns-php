<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

final class LastMinuteCalculator implements PriceCalculatorInterface
{
    private const EXHIBITION_PRICE = 2000.00;

    public function __construct(
        private float $price
    ) {}

    public function calculateForParticipant(Participant $participant): float
    {
        return $this->price * (100 - $participant->getPercentDiscount()) * 0.01;
    }

    public function calculateForSpeaker(Speaker $speaker): float
    {
        return 0.00;
    }

    public function calculateForSponsor(Sponsor $sponsor): float
    {
        return match ($sponsor->getStatus()) {
            Status::STATUS_BRONZE => 5 * ($sponsor->withExhibition() ? (self::EXHIBITION_PRICE + $this->price) : $this->price),
            Status::STATUS_SILVER => 10 * ($sponsor->withExhibition() ? (self::EXHIBITION_PRICE + $this->price) : $this->price),
            Status::STATUS_GOLDEN => $sponsor->withExhibition() ? 200000.00 : 150000.00
        };
    }
}
