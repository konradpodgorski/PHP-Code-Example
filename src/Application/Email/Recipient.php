<?php

namespace Application\Email;

use Domain\ValueObject\Email;
use Domain\ValueObject\Text;

/**
 * Class Recipient
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class Recipient
{
    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Text
     */
    protected $name;

    /**
     * @param Email $email
     * @param Text  $name
     */
    public function __construct(Email $email, Text $name)
    {
        $this->email = $email;
        $this->name = $name;
    }

    /**
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return Text
     */
    public function getName()
    {
        return $this->name;
    }
}
