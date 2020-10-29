<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

class Sponsor implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->isOnline()) {
            $subject->detach($this);
        }
    }
}
