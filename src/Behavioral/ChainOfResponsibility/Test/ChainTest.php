<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility\Test;

use DesignPatterns\Behavioral\ChainOfResponsibility\IsGreaterThan;
use DesignPatterns\Behavioral\ChainOfResponsibility\IsLessThan;
use DesignPatterns\Behavioral\ChainOfResponsibility\IsNotNull;
use DesignPatterns\Behavioral\ChainOfResponsibility\IsString;
use PHPUnit\Framework\TestCase;

final class ChainTest extends TestCase
{
    public function testCanRunValidationInChain(): void
    {
        $isNull = null;
        $isNotString = 5;
        $isNotLessThan10 = 'Test10test';
        $isNotGreaterThan5 = 'Test5';
        $isValid = 'Valid!';

        $chainValidation = new IsNotNull();
        $chainValidation
            ->next(new IsString())
            ->next(new IsLessThan(10))
            ->next(new IsGreaterThan(5));

        $this->assertFalse($chainValidation->validate($isNull));
        $this->assertFalse($chainValidation->validate($isNotString));
        $this->assertFalse($chainValidation->validate($isNotLessThan10));
        $this->assertFalse($chainValidation->validate($isNotGreaterThan5));
        $this->assertTrue($chainValidation->validate($isValid));
    }
}
