<?php

namespace App\Support\Localization;

use DateTime;

/**
 * Interface DateTimerInterface
 * @package App\Support\Localization
 */
interface DateTimerInterface
{
    /**
     * Get the live current date time based on previous configuration.
     * This time can be altered for injection purposes.
     *
     * @return DateTime
     */
    public function getCurrentDateTime();

    /**
     * Inject and modify the current system's DateTime so that
     * it can be used for testing and other purposes.
     *
     * @param DateTime|null $currentDateTime
     *
     * @return mixed
     */
    public function setCurrentDateTime(DateTime $currentDateTime = null);
}
