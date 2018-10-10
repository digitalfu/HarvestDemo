<?php

namespace App\Tests\Harvest;

use App\Harvest\Harvest;
use PHPUnit\Framework\TestCase;
use DateTime;

class HarvestTest extends TestCase
{
    public function testHarvestDate()
    {
        $date = new DateTime();
        $harvest = new Harvest($date);

        $this->assertEquals($date, $harvest->getDate(), 'Harvest date matches date given');
    }
}