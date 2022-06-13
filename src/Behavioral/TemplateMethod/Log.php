<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

use DateTimeImmutable;

final class Log
{
    public function __construct(
        public readonly DateTimeImmutable $date,
        public readonly string $message
    ) {}
}
