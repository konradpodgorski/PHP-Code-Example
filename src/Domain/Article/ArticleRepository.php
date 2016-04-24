<?php

namespace Domain\Article;

/**
 * Interface ArticleRepository
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
interface ArticleRepository
{
    /**
     * @param ArticleId $id
     *
     * @return Article|null
     */
    public function findOneById(ArticleId $id);

    /**
     * @param Article $comment
     */
    public function add(Article $comment);

    /**
     * @param Article $comment
     */
    public function update(Article $comment);

    /**
     * @param Article $comment
     */
    public function remove(Article $comment);
}
