<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy\Test;

use DesignPatterns\Behavioral\Strategy\NotificationPreference;
use DesignPatterns\Behavioral\Strategy\UserNotification;
use PHPUnit\Framework\TestCase;

final class UserNotificationTest extends TestCase
{
    public function testCanNotifyUserByEmailAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(true, false);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        self::assertCount(1, $messages);
        self::assertContains(sprintf('Email: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCanNotifyUserBySystemAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(false, true);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        self::assertCount(1, $messages);
        self::assertContains(sprintf('System: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCanNotifyUserByEmailAndSystemAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(true, true);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        self::assertCount(2, $messages);
        self::assertContains(sprintf('Email: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
        self::assertContains(sprintf('System: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCannotNotifyUserWithoutPreferenceAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(false, false);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        self::assertCount(0, $messages);
    }
}
