<?php

namespace spec\Application\Notification;

use Application\Notification\NotificationSender;
use Application\Notification\Rule\NewCommentToMyArticleNotificationRule;
use Domain\Article\ArticleId;
use Domain\Comment\Comment;
use Domain\Comment\CommentId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationHandlerSpec extends ObjectBehavior
{

    function let(NotificationSender $notificationSender)
    {
        $this->beConstructedWith($notificationSender);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Notification\NotificationHandler');
    }

    function it_should_send_notification_to_article_author(
        NotificationSender $notificationSender,
        Comment $comment,
        $notificationRule,
        $notification
    )
    {
        $articleId = new ArticleId('123e4567-e89b-12d3-a456-426655440000');
        $commentId = new CommentId('123e4567-e89b-12d3-a456-426655440001');

        $comment->getId()->willReturn($commentId);
        $comment->getCommentedThingId()->willReturn($articleId);

        $this->beConstructedWith($notificationSender);

        $notification->beADoubleOf('Application\Notification\Notification');

        $notificationRule->beADoubleOf('Application\Notification\Rule\NotificationRuleInterface');
        $notificationRule->getName()->willReturn('new_comment_to_article');
        $notificationRule->supports($commentId)->willReturn(true);

        $notificationRule->createNotificationsAbout($commentId)->willReturn([$notification]);

        $notificationRules = [];
        $notificationRules[] = $notificationRule;

        $this->registerNotificationRules($notificationRules);

        $this->execute($commentId);

        $notificationSender
            ->send($notification)
            ->shouldHaveBeenCalled();
    }
}
