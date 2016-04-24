<?php

namespace Application\Timer;

/**
 * Class Timer
 *
 * @author Konrad Podgórski <konrad.podgorski@gmail.com>
 */
class Timer
{
    /**
     * @var int
     */
    protected $startTime;

    /**
     * @var int
     */
    protected $timeLimit;

    /**
     * @param int $timeLimit
     */
    public function __construct($timeLimit)
    {
        $this->timeLimit = $timeLimit;
    }

    public function start()
    {
        if ($this->startTime) {
            throw new TimerAlreadyStartedException();
        }

        $this->startTime = time();
    }

    /**
     * @return bool
     */
    public function timeHasElapsed()
    {
        if (time() > ($this->startTime + $this->timeLimit)) {
            return true;
        }

        return false;
    }
}
