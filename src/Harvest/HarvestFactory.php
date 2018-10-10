<?php

namespace App\Harvest;

use DateTime;
use InvalidArgumentException;

class HarvestFactory
{
    /**
     * Create Harvest From Date
     *
     * @param string $dateString A date string that follows the date part of the the ISO8601 format (e.g. 2020-01-20)
     *
     * @return Harvest
     */
    function createHarvestFromDate(string $dateString)
    {
        $date = DateTime::createFromFormat(
            DateTime::ATOM,
            $dateString.'T00:00:01+00:00'
        );

        if($date === false) {
            throw new InvalidArgumentException('Invalid date format');
        }

        return new Harvest($date);
    }
}