<?php

namespace Application\Queue;

/**
 * Class QueueMessage
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class QueueMessage
{
    /**
     * @var array
     */
    protected $body;

    /**
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }
}
