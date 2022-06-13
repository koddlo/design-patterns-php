<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

final class IsString extends AbstractValidator
{
    public function validate(mixed $data): bool
    {
        if (false === is_string($data)) {
            return false;
        }

        return parent::validate($data);
    }
}
