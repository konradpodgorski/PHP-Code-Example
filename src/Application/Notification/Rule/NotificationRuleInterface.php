<?php

namespace Application\Notification\Rule;

use Application\Email\EmailTemplate;
use Application\Notification\Notification;
use Application\Notification\NotificationGroup;
use Domain\Thing\ThingId;

/**
 * Interface NotificationRuleInterface
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
interface NotificationRuleInterface
{
    /**
     * @param ThingId $thingId
     *
     * @return Notification[]
     */
    public function createNotificationsAbout(ThingId $thingId);

    /**
     * @param ThingId $thingId
     *
     * @return bool
     */
    public function supports(ThingId $thingId);

    /**
     * @return EmailTemplate
     */
    public function getNotificationEmailTemplate();

    /**
     * @return NotificationGroup
     */
    public function getNotificationGroup();

    /**
     * @return string
     */
    public function getName();
}
