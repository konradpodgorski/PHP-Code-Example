<?php

namespace spec\Application\Timer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TimerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(3600);

        $this->shouldHaveType('Application\Timer\Timer');
    }
}
