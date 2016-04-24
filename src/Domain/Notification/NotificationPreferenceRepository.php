<?php

namespace Domain\Notification;

use Domain\User\UserId;

interface NotificationPreferenceRepository
{
    /**
     * @param UserId $userId
     *
     * @return NotificationPreference
     */
    public function findOneByUserId(UserId $userId);
}
