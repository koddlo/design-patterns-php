<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

class AgreementDirector
{
    private AgreementBuilder $builder;

    public function __construct(AgreementBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function changeBuilder(AgreementBuilder $builder): void
    {
        $this->builder = $builder;
    }

    public function buildAnonymousAgreement(int $salary): void
    {
        $this->builder
            ->addHeader()
            ->addSalary($salary);
    }

    public function buildFullDetailsAgreement(int $salary, string $contactDetails): void
    {
        $this->builder
            ->addHeader()
            ->addSalary($salary)
            ->addContactDetails($contactDetails);
    }
}
