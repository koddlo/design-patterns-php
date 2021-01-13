<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod;

interface LogRepositoryInterface
{
    public function save(array $logs): void;
}
