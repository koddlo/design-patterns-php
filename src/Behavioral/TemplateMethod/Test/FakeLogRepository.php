<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use DesignPatterns\Behavioral\TemplateMethod\LogRepositoryInterface;

class FakeLogRepository implements LogRepositoryInterface
{
    public function save(array $logs): void
    {
        if (empty($logs)) {
            throw new \BadMethodCallException();
        }
    }
}
