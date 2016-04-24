<?php

namespace Domain\Comment;

/**
 * Interface CommentRepository
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
interface CommentRepository
{
    /**
     * @param CommentId $id
     *
     * @return Comment|null
     */
    public function findOneById(CommentId $id);

    /**
     * @param Comment $comment
     */
    public function add(Comment $comment);

    /**
     * @param Comment $comment
     */
    public function update(Comment $comment);

    /**
     * @param Comment $comment
     */
    public function remove(Comment $comment);
}
