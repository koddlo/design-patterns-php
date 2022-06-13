<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

final class IsLessThan extends AbstractValidator
{
    public function __construct(
        private int $length
    ) {}

    public function validate(mixed $data): bool
    {
        if (strlen($data) >= $this->length) {
            return false;
        }

        return parent::validate($data);
    }
}
