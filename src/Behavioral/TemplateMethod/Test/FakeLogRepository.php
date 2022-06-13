<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\TemplateMethod\Test;

use BadMethodCallException;
use DesignPatterns\Behavioral\TemplateMethod\LogRepositoryInterface;

final class FakeLogRepository implements LogRepositoryInterface
{
    public function save(array $logs): void
    {
        if (empty($logs)) {
            throw new BadMethodCallException();
        }
    }
}
