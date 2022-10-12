<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor;

enum Status: string
{
    case STATUS_BRONZE = 'bronze';
    case STATUS_SILVER = 'silver';
    case STATUS_GOLDEN = 'golden';
}
