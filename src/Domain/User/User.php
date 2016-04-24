<?php

namespace Domain\User;

use Domain\ValueObject\Email;
use Domain\ValueObject\Text;

/**
 * Class User
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class User
{
    /**
     * @var UserId
     */
    protected $id;

    /**
     * @var Text
     */
    protected $name;

    /**
     * @var Email
     */
    protected $email;

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return UserId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param UserId $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Text
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Text $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
