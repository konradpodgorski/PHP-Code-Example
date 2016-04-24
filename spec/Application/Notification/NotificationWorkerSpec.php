<?php

namespace spec\Application\Notification;

use Application\Queue\QueueProvider;
use Application\Notification\NotificationHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationWorkerSpec extends ObjectBehavior
{
    function let(NotificationHandler $notificationHandler, QueueProvider $queueProvider)
    {
        $this->beConstructedWith($notificationHandler, $queueProvider, 'notifications');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Notification\NotificationWorker');
    }
}
