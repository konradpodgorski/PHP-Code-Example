<?php

namespace Domain\ValueObject;

/**
 * ValueObject Text
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class Text
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getValue();
    }


    /**
     * @param Text $other
     *
     * @return bool
     */
    public function isEqualTo(Text $other)
    {
        if ($this->getValue() === $other->getValue()) {
            return true;
        }

        return false;
    }
}
