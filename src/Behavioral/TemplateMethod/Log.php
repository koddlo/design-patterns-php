<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

use DateTimeImmutable;

final readonly class Log
{
    public function __construct(
        public DateTimeImmutable $date,
        public string $message
    ) {}
}
