<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

class B2BContractBuilder implements AgreementBuilder
{
    private Agreement $b2BContract;

    public function __construct()
    {
        $this->b2BContract = new B2BContract();
    }

    public function addHeader(): AgreementBuilder
    {
        $this->b2BContract->setTitle('Services Contract');
        return $this;
    }

    public function addSalary(int $salary): AgreementBuilder
    {
        $this->b2BContract->setSalary($salary);
        return $this;
    }

    public function addContactDetails(string $contactDetails): AgreementBuilder
    {
        $this->b2BContract->setContactDetails(sprintf('Company: %s', $contactDetails));
        return $this;
    }

    public function getAgreement(): Agreement
    {
        return $this->b2BContract;
    }
}
