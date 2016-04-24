<?php

namespace Application\Notification;

use Application\Queue\QueueMessage;
use Application\Queue\QueueProvider;
use Application\Timer\Timer;
use Domain\Thing\ThingId;

/**
 * Class NotificationWorker
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class NotificationWorker
{
    /**
     * @var QueueProvider
     */
    protected $queueProvider;

    /**
     * @var string
     */
    protected $queueName;

    /**
     * @var NotificationHandler
     */
    protected $notificationHandler;

    /**
     * @param NotificationHandler $notificationHandler
     * @param QueueProvider       $queueProvider
     * @param string              $queueName
     */
    function __construct(NotificationHandler $notificationHandler, QueueProvider $queueProvider, $queueName)
    {
        $this->notificationHandler = $notificationHandler;
        $this->queueProvider = $queueProvider;
        $this->queueName = $queueName;
    }

    public function process()
    {
        $notificationsQueue = $this->queueProvider->getQueue($this->queueName);

        $timer = new Timer(600); // 10min limit
        $timer->start();

        while (true) {
            // after 10 minutes script will end and new instance will be started with cron
            if ($timer->timeHasElapsed()) {
                exit;
            }

            $queueMessages = $notificationsQueue->claim(10);

            if ($queueMessages) {
                foreach ($queueMessages as $message) {
                    /** @var QueueMessage $message */
                    $body = $message->getBody();

                    if (isset($body['thingId'])) {
                        /** @var ThingId $thingId */
                        $thingId = $body['thingId'];

                        $this->notificationHandler->execute($thingId);
                    }

                    $notificationsQueue->remove($message);
                }
            }

            // 10 second sleep
            $this->randomSleep(10, 10);
        }
    }

    /**
     * @param int $min
     * @param int $max
     */
    protected function randomSleep($min = 10, $max = 40)
    {
        $time = mt_rand($min, $max);

        sleep($time);
    }
}
