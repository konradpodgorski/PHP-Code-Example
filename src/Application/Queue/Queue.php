<?php

namespace Application\Queue;

interface Queue
{
    /**
     * @param string $name
     */
    public function __construct($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param QueueMessage $queueMessage
     */
    public function push(QueueMessage $queueMessage);

    /**
     * @param int $limit
     *
     * @return QueueMessage[]
     */
    public function claim($limit = 10);

    /**
     * @return QueueMessage
     */
    public function claimOne();

    /**
     * @param QueueMessage $queueMessage
     */
    public function remove(QueueMessage $queueMessage);
}
