<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge\Test;

use DesignPatterns\Structural\Bridge\HealthCare;
use DesignPatterns\Structural\Bridge\Junior;
use DesignPatterns\Structural\Bridge\Senior;
use PHPUnit\Framework\TestCase;

final class HealthCareTest extends TestCase
{
    public function testCalculatingGrantForJunior(): void
    {
        $healthCareJuniorGrant = 360.00;

        $healthCare = new HealthCare(new Junior());

        $this->assertSame($healthCareJuniorGrant, $healthCare->calculateGrant());
    }

    public function testCalculatingGrantForSenior(): void
    {
        $healthCareSeniorGrant = 840.00;

        $healthCare = new HealthCare(new Senior());

        $this->assertSame($healthCareSeniorGrant, $healthCare->calculateGrant());
    }
}
