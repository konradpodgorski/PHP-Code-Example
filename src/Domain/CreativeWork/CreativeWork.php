<?php

namespace Domain\CreativeWork;

use Domain\User\User;
use Domain\ValueObject\Text;
use Domain\ValueObject\Url;

/**
 * Class CreativeWork
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class CreativeWork
{
    /**
     * @var User
     */
    protected $author;

    /**
     * @var Text
     */
    protected $headline;

    /**
     * @var Text
     */
    protected $text;

    /**
     * @var Url
     */
    protected $url;

    /**
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param User $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Text
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param Text $headline
     *
     * @return $this
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * @return Text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param Text $text
     *
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param Url $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}
