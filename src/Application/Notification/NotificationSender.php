<?php

namespace Application\Notification;

use Domain\Notification\NotificationPreferenceRepository;
use Application\Email\EmailSender;
use Application\Email\Recipient;

/**
 * Class NotificationSender
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class NotificationSender
{
    /**
     * @var NotificationPreferenceRepository
     */
    protected $notificationPreferenceRepository;

    /**
     * @var EmailSender
     */
    protected $emailSender;

    /**
     * @param EmailSender                      $emailSender
     * @param NotificationPreferenceRepository $notificationPreferenceRepository
     */
    public function __construct(
        EmailSender $emailSender,
        NotificationPreferenceRepository $notificationPreferenceRepository
    )
    {
        $this->emailSender = $emailSender;
        $this->notificationPreferenceRepository = $notificationPreferenceRepository;
    }

    /**
     * @param Notification $notification
     */
    public function send(Notification $notification)
    {
        $user = $notification->getUser();

        $notificationPreference = $this->notificationPreferenceRepository->findOneByUserId($user->getId());

        $group = $notification->getGroup();

        if ($notificationPreference && $group) {
            $enabled = $notificationPreference->isGroupEnabled($group);
            if ($enabled) {
                $this->emailSender
                    ->sendMessage(
                        new Recipient($user->getEmail(), $user->getName()),
                        $notification->getEmailTemplate(),
                        $notification->getContext()
                    );
            }
        }
    }
}
