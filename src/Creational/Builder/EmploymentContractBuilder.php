<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

class EmploymentContractBuilder implements AgreementBuilder
{
    private Agreement $employmentContract;

    public function __construct()
    {
        $this->employmentContract = new EmploymentContract();
    }

    public function addHeader(): AgreementBuilder
    {
        $this->employmentContract->setTitle('Employment Contract');
        return $this;
    }

    public function addSalary(int $salary): AgreementBuilder
    {
        $this->employmentContract->setSalary($salary);
        return $this;
    }

    public function addContactDetails(string $contactDetails): AgreementBuilder
    {
        $this->employmentContract->setContactDetails(sprintf('Person: %s', $contactDetails));
        return $this;
    }

    public function getAgreement(): Agreement
    {
        return $this->employmentContract;
    }
}
