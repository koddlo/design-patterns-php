<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

class Log
{
    private \DateTimeImmutable $date;

    private string $message;

    public function __construct(\DateTimeImmutable $date, string $message)
    {
        $this->date = $date;
        $this->message = $message;
    }
}
