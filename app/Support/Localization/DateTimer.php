<?php

namespace App\Support\Localization;

use DateTime;
use Panda\Bootstrap\DateTimer as PandaDateTimer;

/**
 * Class DateTimer
 * @package App\Support\Localization
 */
class DateTimer extends PandaDateTimer implements DateTimerInterface
{
    /**
     * @var DateTime
     */
    protected $currentDateTime = null;

    /**
     * @return DateTime
     */
    public function getCurrentDateTime()
    {
        return $this->currentDateTime ? clone $this->currentDateTime : new DateTime();
    }

    /**
     * @param DateTime $currentDateTime
     *
     * @return $this
     */
    public function setCurrentDateTime(DateTime $currentDateTime = null)
    {
        $this->currentDateTime = $currentDateTime;

        return $this;
    }
}
