<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\ChainOfResponsibility;

abstract class AbstractValidator
{
    private ?self $next = null;

    public function validate(mixed $data): bool
    {
        if ($this->next === null) {
            return true;
        }

        return $this->next->validate($data);
    }

    public function next(self $next): self
    {
        $this->next = $next;
        return $next;
    }
}
