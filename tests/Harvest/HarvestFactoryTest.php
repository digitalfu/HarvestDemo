<?php

namespace App\Tests\Harvest;

use App\Harvest\Harvest;
use App\Harvest\HarvestFactory;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class HarvestFactoryTest extends TestCase
{
    public function testCreateHarvestFromDateSuccess()
    {
        $date = '2000-01-01';
        $factory = new HarvestFactory();
        $harvest = $factory->createHarvestFromDate($date);
        $this->assertInstanceOf(Harvest::class, $harvest, 'Harvest factory returns instance of Harvest');
    }

    public function testCreateHarvestFromDateInvalidArgumentException()
    {
        $this->expectExceptionObject(new InvalidArgumentException('Invalid date format'));
        $invalidDate = 'blah';
        $factory = new HarvestFactory();
        $factory->createHarvestFromDate($invalidDate);
    }
}