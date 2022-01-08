<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

class IsGreaterThan extends AbstractValidator
{
    private int $length;

    public function __construct(int $length)
    {
        $this->length = $length;
    }

    public function validate(mixed $data): bool
    {
        if (strlen($data) <= $this->length) {
            return false;
        }

        return parent::validate($data);
    }
}
