<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

enum State: string
{
    case OPEN = 'open';
    case IN_PROGRESS = 'inProgress';
    case RESOLVED = 'resolved';
    case CLOSED = 'closed';
    case REOPENED = 'reopened';
}
