<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

use SplObserver;
use SplSubject;

final class ConferenceStatistic implements SplObserver
{
    private int $onlineAmount = 0;

    private int $offlineAmount = 0;

    public function update(SplSubject $subject): void
    {
        if (! $subject instanceof Conference) {
            return;
        }

        if ($subject->isOffline()) {
            ++$this->offlineAmount;

            return;
        }

        if ($subject->isOnline()) {
            ++$this->onlineAmount;
        }
    }

    public function countOnline(): int
    {
        return $this->onlineAmount;
    }
}
