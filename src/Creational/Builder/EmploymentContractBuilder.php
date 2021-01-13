<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

class EmploymentContractBuilder implements AgreementBuilderInterface
{
    private AbstractAgreement $employmentContract;

    public function __construct()
    {
        $this->employmentContract = new EmploymentContract();
    }

    public function addHeader(): AgreementBuilderInterface
    {
        $this->employmentContract->setTitle('Employment Contract');
        return $this;
    }

    public function addSalary(int $salary): AgreementBuilderInterface
    {
        $this->employmentContract->setSalary($salary);
        return $this;
    }

    public function addContactDetails(string $contactDetails): AgreementBuilderInterface
    {
        $this->employmentContract->setContactDetails(sprintf('Person: %s', $contactDetails));
        return $this;
    }

    public function getAgreement(): AbstractAgreement
    {
        return $this->employmentContract;
    }
}
