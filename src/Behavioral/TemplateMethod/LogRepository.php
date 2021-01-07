<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

interface LogRepository
{
    public function save(array $logs): void;
}
