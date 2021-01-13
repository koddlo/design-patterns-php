<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

interface AgreementBuilderInterface
{
    public function addHeader(): AgreementBuilderInterface;

    public function addSalary(int $salary): AgreementBuilderInterface;

    public function addContactDetails(string $contactDetails): AgreementBuilderInterface;

    public function getAgreement(): AbstractAgreement;
}
