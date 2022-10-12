<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

interface PriceCalculatorInterface
{
    public function calculateForParticipant(Participant $participant): float;

    public function calculateForSpeaker(Speaker $speaker): float;

    public function calculateForSponsor(Sponsor $sponsor): float;
}
