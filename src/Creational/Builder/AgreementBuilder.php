<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

interface AgreementBuilder
{
    public function addHeader(): AgreementBuilder;

    public function addSalary(int $salary): AgreementBuilder;

    public function addContactDetails(string $contactDetails): AgreementBuilder;

    public function getAgreement(): Agreement;
}
