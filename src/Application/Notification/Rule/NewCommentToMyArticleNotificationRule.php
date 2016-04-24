<?php

namespace Application\Notification\Rule;

use Application\Notification\Notification;
use Domain\Article\Article;
use Domain\Article\ArticleRepository;
use Domain\Comment\CommentId;
use Domain\Comment\CommentRepository;
use Domain\Thing\ThingId;
use Domain\User\UserRepository;

class NewCommentToMyArticleNotificationRule extends AbstractNotificationRule
{
    /**
     * @var ArticleRepository
     */
    protected $articleRepository;

    /**
     * @var CommentRepository
     */
    protected $commentRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param ArticleRepository $articleRepository
     * @param CommentRepository $commentRepository
     * @param UserRepository    $userRepository
     */
    public function __construct(
        ArticleRepository $articleRepository,
        CommentRepository $commentRepository,
        UserRepository $userRepository
    )
    {
        $this->articleRepository = $articleRepository;
        $this->commentRepository = $commentRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'new_comment_to_my_article';
    }

    /**
     * @param ThingId $thingId
     *
     * @return Notification[]
     */
    public function createNotificationsAbout(ThingId $thingId)
    {
        $comment = $this->commentRepository->findOneById(CommentId::createFrom($thingId));

        $article = $this->articleRepository->findOneById($comment->getCommentedThingId()->getInteger());

        if (false === $article instanceof Article) {
            return [];
        }

        /** @var Article $article */
        $author = $article->getAuthor();

        if ($author) {
            $notification = new Notification(
                $author,
                $this->getNotificationGroup(),
                $this->getNotificationEmailTemplate(),
                [
                    'user' => $author,
                    'blogPost' => $article,
                    'comment' => $comment
                ]
            );

            return [$notification];
        }

        return [];
    }

    /**
     * @param ThingId $thingId
     *
     * @return bool
     */
    public function supports(ThingId $thingId)
    {
        if ($thingId->getGroup() !== 'comment') {
            return false;
        }

        $comment = $this->commentRepository->findOneById(CommentId::createFrom($thingId));

        $commentedThingId = $comment->getCommentedThingId();
        if ($commentedThingId->getGroup() === 'blogpost') {
            return true;
        }

        return false;
    }
}
