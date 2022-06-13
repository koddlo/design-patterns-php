<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

final class Client
{
    private ?ClientTypeInterface $type;

    public function setType(?ClientTypeInterface $type): void
    {
        $this->type = $type;
    }

    public function getType(): ClientTypeInterface
    {
        return $this->type ?? new NullClientType();
    }
}
