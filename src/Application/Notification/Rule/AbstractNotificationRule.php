<?php

namespace Application\Notification\Rule;

use Application\Email\EmailTemplate;
use Application\Notification\NotificationGroup;

/**
 * Class AbstractNotificationRule
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
abstract class AbstractNotificationRule implements NotificationRuleInterface
{
    /**
     * @return EmailTemplate
     */
    public function getNotificationEmailTemplate()
    {
        return new EmailTemplate(sprintf(
            'EmailTemplate/notification_%s.html.twig',
            $this->getName()
        ));
    }

    /**
     * @return NotificationGroup
     */
    public function getNotificationGroup()
    {
        return new NotificationGroup($this->getName());
    }

    /**
     * @return string
     */
    abstract public function getName();
}
