<?php

namespace Domain\Notification;

use Domain\User\UserId;

class NotificationPreference
{
    /**
     * @var UserId
     */
    protected $userId;


    public function isGroupEnabled(NotificationGroup $group)
    {
        // to simplify example, each group can be stored as separate column or array encoded to json
        return true;
    }
}
