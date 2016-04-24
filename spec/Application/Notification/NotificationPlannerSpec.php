<?php

namespace spec\Application\Notification;

use Application\Queue\QueueProvider;
use Domain\Thing\ThingId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationPlannerSpec extends ObjectBehavior
{
    function let(QueueProvider $queueProvider)
    {
        $this->beConstructedWith($queueProvider, 'notifications');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Notification\NotificationPlanner');
    }

    function it_should_queue_correctly(QueueProvider $queueProvider, $queue, ThingId $thingId)
    {
        $queue->beADoubleOf('Application\Queue\Queue');
        $queue->getName()->willReturn('notifications');

        $queueProvider->getQueue('notifications')->willReturn($queue);

        $this->beConstructedWith($queueProvider, 'notifications');

        $this->scheduleNotificationAbout($thingId);

        $queue->push(Argument::any())->shouldNotHaveBeenCalled();

        $this->flush();

        $queue->push(Argument::any())->shouldHaveBeenCalled();
    }
}
