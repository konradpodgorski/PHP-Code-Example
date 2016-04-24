<?php

namespace Application\Notification;

use Application\Notification\Rule\NotificationRuleInterface;
use Domain\Thing\ThingId;

class NotificationHandler
{
    /**
     * @var NotificationRuleInterface[]
     */
    protected $notificationRules;

    /**
     * @var NotificationSender
     */
    protected $notificationSender;

    public function __construct(NotificationSender $notificationSender)
    {
        $this->notificationSender = $notificationSender;
    }

    /**
     * @param NotificationRuleInterface[] $notificationRules
     *
     * @throws \LogicException
     */
    public function registerNotificationRules($notificationRules)
    {
        foreach ($notificationRules as $notificationRule) {
            if ($notificationRule instanceof NotificationRuleInterface) {
                $this->notificationRules[$notificationRule->getName()] = $notificationRule;
            } else {
                throw new \LogicException(sprintf(
                    '%s does not implement NotificationRuleInterface',
                    get_class($notificationRule)
                ));
            }
        }
    }

    public function execute(ThingId $thingId)
    {
        foreach ($this->notificationRules as $notificationRule) {
            if ($notificationRule->supports($thingId)) {
                $notifications = $notificationRule->createNotificationsAbout($thingId);

                foreach ($notifications as $notification) {
                    $this->notificationSender->send($notification);
                }
            }
        }
    }
}
