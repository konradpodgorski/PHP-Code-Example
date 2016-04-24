<?php

namespace Domain\Thing;

/**
 * Class ThingId
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class ThingId
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @param $uuid
     */
    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }
}
