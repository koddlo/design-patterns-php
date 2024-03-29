<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

final class IsNotNull extends AbstractValidator
{
    public function validate(mixed $data): bool
    {
        if (null === $data) {
            return false;
        }

        return parent::validate($data);
    }
}
