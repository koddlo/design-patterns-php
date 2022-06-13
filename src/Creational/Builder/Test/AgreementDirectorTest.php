<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder\Test;

use DesignPatterns\Creational\Builder\AgreementDirector;
use DesignPatterns\Creational\Builder\B2BContract;
use DesignPatterns\Creational\Builder\B2BContractBuilder;
use DesignPatterns\Creational\Builder\EmploymentContract;
use DesignPatterns\Creational\Builder\EmploymentContractBuilder;
use PHPUnit\Framework\TestCase;

final class AgreementDirectorTest extends TestCase
{
    public function testCanBuildAnonymousB2BContract(): void
    {
        $b2bContractBuilder = new B2BContractBuilder();
        $director = new AgreementDirector($b2bContractBuilder);

        $director->buildAnonymousAgreement(6000);

        self::assertInstanceOf(B2BContract::class, $b2bContractBuilder->getAgreement());
    }

    public function testCanBuildFullDetailsB2BContract(): void
    {
        $b2bContractBuilder = new B2BContractBuilder();
        $director = new AgreementDirector($b2bContractBuilder);

        $director->buildFullDetailsAgreement(6000, 'Test Company Ltc.');

        self::assertInstanceOf(B2BContract::class, $b2bContractBuilder->getAgreement());
    }

    public function testCanBuildAnonymousEmploymentContract(): void
    {
        $employmentContractBuilder = new EmploymentContractBuilder();
        $director = new AgreementDirector($employmentContractBuilder);

        $director->buildAnonymousAgreement(5000);

        self::assertInstanceOf(EmploymentContract::class, $employmentContractBuilder->getAgreement());
    }

    public function testCanBuildFullDetailsEmploymentContract(): void
    {
        $employmentContractBuilder = new EmploymentContractBuilder();
        $director = new AgreementDirector($employmentContractBuilder);

        $director->buildFullDetailsAgreement(5000, 'Jane Doe');

        self::assertInstanceOf(EmploymentContract::class, $employmentContractBuilder->getAgreement());
    }

    public function testCanSwitchBuilder(): void
    {
        $b2bContractBuilder = new B2BContractBuilder();
        $director = new AgreementDirector($b2bContractBuilder);
        $director->buildAnonymousAgreement(6000);
        $employmentContractBuilder = new EmploymentContractBuilder();

        $director->changeBuilder($employmentContractBuilder);
        $director->buildAnonymousAgreement(5000);

        self::assertInstanceOf(EmploymentContract::class, $employmentContractBuilder->getAgreement());
    }
}
