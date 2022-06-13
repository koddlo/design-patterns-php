<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge\Test;

use DesignPatterns\Structural\Bridge\Junior;
use DesignPatterns\Structural\Bridge\Senior;
use DesignPatterns\Structural\Bridge\TrainingBudget;
use PHPUnit\Framework\TestCase;

final class TrainingBudgetTest extends TestCase
{
    public function testCalculatingGrantForJunior(): void
    {
        $trainingBudgetJuniorGrant = 900.00;

        $trainingBudget = new TrainingBudget(new Junior());

        self::assertSame($trainingBudgetJuniorGrant, $trainingBudget->calculateGrant());
    }

    public function testCalculatingGrantForSenior(): void
    {
        $trainingBudgetSeniorGrant = 700.00;

        $trainingBudget = new TrainingBudget(new Senior());

        self::assertSame($trainingBudgetSeniorGrant, $trainingBudget->calculateGrant());
    }
}
