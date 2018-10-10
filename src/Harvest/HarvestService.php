<?php

namespace App\Harvest;


use DateTime;

class HarvestService
{
    /**
     * Get Days Till Harvest
     * @param Harvest $harvest
     *
     * @return int
     */
    function getDaysTillHarvest(Harvest $harvest)
    {
        $today = new DateTime();
        $daysTillHarvest = $today->diff($harvest->getDate())->days;

        return $daysTillHarvest;
    }
}