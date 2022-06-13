<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade\Test;

use DesignPatterns\Structural\Facade\EmailModule\CloudApiSender;
use DesignPatterns\Structural\Facade\EmailModule\CloudClientInterface;
use DesignPatterns\Structural\Facade\EmailModule\SmtpSender;
use DesignPatterns\Structural\Facade\NotificationFacade;
use DesignPatterns\Structural\Facade\SmsModule\SmsNotifier;
use DesignPatterns\Structural\Facade\User;
use PHPUnit\Framework\TestCase;

final class NotificationFacadeTest extends TestCase
{
    public function testCanSendSmsIfUserHasPhoneNumber(): void
    {
        $phoneNumber = '123456789';
        $user = new User('test@koddlo.pl');
        $user->setPhoneNumber($phoneNumber);
        $notificationFacade = new NotificationFacade(
            new CloudApiSender($this->createMock(CloudClientInterface::class)),
            new SmtpSender(),
            new SmsNotifier()
        );

        self::assertSame($notificationFacade->send($user), "SMS: $phoneNumber");
    }

    public function testCanSendEmailByCloudIfUserHasAccount(): void
    {
        $email = 'test@koddlo.pl';
        $user = new User($email);
        $cloudClient = $this->createMock(CloudClientInterface::class);
        $cloudClient
            ->method('hasAccount')
            ->with($email)
            ->willReturn(true);
        $notificationFacade = new NotificationFacade(
            new CloudApiSender($cloudClient),
            new SmtpSender(),
            new SmsNotifier()
        );

        self::assertSame($notificationFacade->send($user), "Email (Cloud): $email");
    }

    public function testIsEmailSendBySmtpIfUserDoesNotHaveCloudAccount(): void
    {
        $email = 'test@koddlo.pl';
        $user = new User($email);
        $cloudClient = $this->createMock(CloudClientInterface::class);
        $cloudClient
            ->method('hasAccount')
            ->with($email)
            ->willReturn(false);
        $notificationFacade = new NotificationFacade(
            new CloudApiSender($cloudClient),
            new SmtpSender(),
            new SmsNotifier()
        );

        self::assertSame($notificationFacade->send($user), "Email (SMTP): $email");
    }
}
