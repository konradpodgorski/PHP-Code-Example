<?php

namespace spec\Domain\Comment;

use Domain\Comment\CommentId;
use Domain\Thing\ThingId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Domain\Comment\Comment');
    }

    function it_should_have_methods(CommentId $commentId, ThingId $thingId)
    {
        $this->setId($commentId);
        $this->getId()->shouldReturn($commentId);

        $this->setCommentedThingId($thingId);
        $this->getCommentedThingId()->shouldReturn($thingId);
    }
}
