<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Facade;

use DesignPatterns\Structural\Facade\EmailModule\UserNotFoundException;
use DesignPatterns\Structural\Facade\EmailModule\CloudApiSender;
use DesignPatterns\Structural\Facade\EmailModule\SmtpSender;
use DesignPatterns\Structural\Facade\SmsModule\SmsNotifier;

class NotificationFacade
{
    private CloudApiSender $cloudEmailSender;

    private SmtpSender $smtpEmailSender;

    private SmsNotifier $smsNotifier;

    public function __construct(
        CloudApiSender $cloudEmailSender,
        SmtpSender $smtpEmailSender,
        SmsNotifier $smsNotifier
    ) {
        $this->cloudEmailSender = $cloudEmailSender;
        $this->smtpEmailSender = $smtpEmailSender;
        $this->smsNotifier = $smsNotifier;
    }

    public function send(User $user): string
    {
        if ($user->hasPhoneNumber()) {
            return $this->smsNotifier->notify($user->getPhoneNumber());
        }

        try {
            return $this->cloudEmailSender->send($user->getEmail());
        } catch (UserNotFoundException) {
            return $this->smtpEmailSender->send($user->getEmail());
        }
    }
}
