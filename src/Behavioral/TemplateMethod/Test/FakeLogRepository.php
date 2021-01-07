<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\LogRepository;

class FakeLogRepository implements LogRepository
{
    public function save(array $logs): void
    {
        if (empty($logs)) {
            throw new \BadMethodCallException();
        }
    }
}
