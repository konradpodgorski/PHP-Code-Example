<?php

namespace Application\Notification;

use Application\Email\EmailTemplate;
use Domain\User\User;

class Notification
{
    /**
     * @var User
     */
    protected $user;

    /**
     * @var NotificationGroup
     */
    protected $group;

    /**
     * @var EmailTemplate
     */
    protected $emailTemplate;

    /**
     * @var array
     */
    protected $context;

    /**
     * @param User              $user
     * @param NotificationGroup $group
     * @param EmailTemplate     $emailTemplate
     * @param array             $context
     */
    public function __construct(User $user, NotificationGroup $group, EmailTemplate $emailTemplate, $context)
    {
        $this->user = $user;
        $this->group = $group;
        $this->emailTemplate = $emailTemplate;
        $this->context = $context;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return EmailTemplate
     */
    public function getEmailTemplate()
    {
        return $this->emailTemplate;
    }

    /**
     * @return NotificationGroup
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
