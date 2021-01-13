<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Builder;

abstract class AbstractAgreement
{
    private string $title;

    private int $salary;

    private string $contactDetails;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }

    public function setContactDetails(string $contactDetails): void
    {
        $this->contactDetails = $contactDetails;
    }
}
