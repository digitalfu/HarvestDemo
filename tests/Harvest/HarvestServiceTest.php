<?php

namespace App\Tests\Harvest;

use App\Harvest\Harvest;
use App\Harvest\HarvestService;
use PHPUnit\Framework\TestCase;
use DateTime;

class HarvestServiceTest extends TestCase
{
    public function setUp()
    {
        timecop_freeze(DateTime::createFromFormat(
            DateTime::ATOM,
            '2000-01-25T00:00:01+00:00'
        ));

        parent::setUp();
    }

    public function testGetDaysTillHarvestSuccess()
    {
        $date = DateTime::createFromFormat(DateTime::ATOM, '2000-02-25T00:00:01+00:00');
        $service = new HarvestService();
        $mockHarvest = $this->createMock(Harvest::class);
        $mockHarvest
            ->method('getDate')
            ->willReturn($date);

        $result = $service->getDaysTillHarvest($mockHarvest);
        $this->assertEquals(31, $result, 'returns correct days till harvest');
    }

    public function tearDown()
    {
        timecop_return();

        parent::tearDown(); // TODO: Change the autogenerated stub
    }
}