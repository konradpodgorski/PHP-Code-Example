<?php

namespace spec\Application\Queue;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QueueProviderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Queue\QueueProvider');
    }

    function it_return_requested_queue($queue)
    {
        $queue->beADoubleOf('Application\Queue\Queue');
        $queue->getName()->willReturn('notifications');

        $this->registerQueue($queue);

        $this->getQueue('notifications')->shouldReturn($queue);
        $this->shouldThrow('Application\Queue\QueueNotFoundException')->during('getQueue', ['foo']);
    }
}
