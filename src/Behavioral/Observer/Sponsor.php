<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

final class Sponsor implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        if (!$subject->isOnline()) {
            return;
        }

        $subject->detach($this);
    }
}
