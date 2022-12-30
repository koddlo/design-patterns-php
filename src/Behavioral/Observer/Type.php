<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

enum Type: int
{
    case UNDECIDED = 0;
    case OFFLINE = 1;
    case ONLINE = 2;
}
