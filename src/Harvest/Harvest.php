<?php
/**
 * Created by PhpStorm.
 * User: hamishcoates
 * Date: 10/10/18
 * Time: 11:11 AM
 */

namespace App\Harvest;


use DateTime;

class Harvest
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * Harvest constructor.
     *
     * @param DateTime $date
     */
    public function __construct(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}