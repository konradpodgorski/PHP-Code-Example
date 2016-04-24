<?php

namespace Domain\Comment;

use Domain\CreativeWork\CreativeWork;
use Domain\Thing\ThingId;

/**
 * Class Comment
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class Comment extends CreativeWork
{
    /**
     * @var CommentId
     */
    protected $id;

    /**
     * @var ThingId
     */
    protected $commentedThingId;

    /**
     * @return CommentId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param CommentId $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return ThingId
     */
    public function getCommentedThingId()
    {
        return $this->commentedThingId;
    }

    /**
     * @param ThingId $commentedThingId
     *
     * @return $this
     */
    public function setCommentedThingId($commentedThingId)
    {
        $this->commentedThingId = $commentedThingId;

        return $this;
    }
}
