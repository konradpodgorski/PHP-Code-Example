<?php

namespace Application\Queue;

/**
 * Class QueueProvider
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class QueueProvider
{
    /**
     * @var Queue[]
     */
    protected $queues;

    /**
     * @param Queue $queue
     */
    public function registerQueue(Queue $queue)
    {
        $this->queues[$queue->getName()] = $queue;
    }

    /**
     * @param $name
     *
     * @return Queue
     * @throws QueueNotFoundException
     */
    public function getQueue($name)
    {
        if (isset($this->queues[$name])) {
            return $this->queues[$name];
        }

        throw new QueueNotFoundException();
    }
}
