<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

class IsString extends AbstractValidator
{
    public function validate(mixed $data): bool
    {
        if (is_string($data) === false) {
            return false;
        }

        return parent::validate($data);
    }
}
