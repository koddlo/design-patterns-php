<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy;

final class UserNotification
{
    public const string PASSWORD_EXPIRE_MESSAGE = 'Your password will expire in 3 days. Please change it as soon as possible.';

    public function onPasswordExpired(NotificationPreference $notificationPreference): array
    {
        $messages = [];
        $notifyStrategies = $this->determineStrategies($notificationPreference);
        /** @var NotifyInterface $notifyStrategy */
        foreach ($notifyStrategies as $notifyStrategy) {
            $messages[] = $notifyStrategy->notify(self::PASSWORD_EXPIRE_MESSAGE);
        }

        return $messages;
    }

    private function determineStrategies(NotificationPreference $notificationPreference): array
    {
        $notifyStrategies = [];

        if ($notificationPreference->shouldNotifyByEmail()) {
            $notifyStrategies[] = new EmailNotifier();
        }

        if ($notificationPreference->shouldNotifyBySystem()) {
            $notifyStrategies[] = new SystemNotifier();
        }

        return $notifyStrategies;
    }
}
