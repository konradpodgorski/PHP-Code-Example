<?php

namespace Application\Notification;

use Application\Queue\QueueMessage;
use Application\Queue\QueueProvider;
use Domain\Thing\ThingId;

/**
 * Class NotificationPlanner
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class NotificationPlanner
{
    /**
     * @var []
     */
    protected $localQueue;

    /**
     * @var QueueProvider
     */
    protected $queueProvider;

    /**
     * @var string
     */
    protected $queueName;

    /**
     * @param QueueProvider $queueProvider
     */
    public function __construct(QueueProvider $queueProvider, $queueName)
    {
        $this->queueProvider = $queueProvider;
        $this->queueName = $queueName;
    }

    /**
     * @param ThingId $thingId
     */
    public function scheduleNotificationAbout(ThingId $thingId)
    {
        $this->localQueue[] = $thingId;
    }

    /**
     * Flush information about scheduled things for notifications to the actual external queue
     */
    public function flush()
    {
        if (count($this->localQueue) === 0) {
            return;
        }

        $queue = $this->queueProvider->getQueue($this->queueName);

        foreach ($this->localQueue as $thingId) {
            $queue->push(new QueueMessage(['thingId' => $thingId]));
        }
        $this->localQueue = [];
    }
}
