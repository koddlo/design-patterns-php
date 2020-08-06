<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\NullObject;

class Client
{
    private ?ClientType $type;

    public function setType(?ClientType $type): void
    {
        $this->type = $type;
    }

    public function getType(): ClientTypeInterface
    {
        return $this->type ?? new NullClientType();
    }
}
