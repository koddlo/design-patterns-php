<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

class B2BContractBuilder implements AgreementBuilderInterface
{
    private AbstractAgreement $b2BContract;

    public function __construct()
    {
        $this->b2BContract = new B2BContract();
    }

    public function addHeader(): AgreementBuilderInterface
    {
        $this->b2BContract->setTitle('Services Contract');
        return $this;
    }

    public function addSalary(int $salary): AgreementBuilderInterface
    {
        $this->b2BContract->setSalary($salary);
        return $this;
    }

    public function addContactDetails(string $contactDetails): AgreementBuilderInterface
    {
        $this->b2BContract->setContactDetails(sprintf('Company: %s', $contactDetails));
        return $this;
    }

    public function getAgreement(): AbstractAgreement
    {
        return $this->b2BContract;
    }
}
