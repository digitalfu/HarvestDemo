<?php

use Behat\Behat\Context\Context;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * This context class contains the definitions of the steps used by the demo 
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 * 
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext implements Context
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    /**
     * @var DateTime
     */
    private $date;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given today is :today
     */
    public function todayIs(string $today)
    {
        timecop_freeze(DateTime::createFromFormat(
            DateTime::ATOM,
            $today.'T00:00:01+00:00'
        ));
    }

    /**
     * @Given a projected harvest of :date
     * @param string $date
     */
    public function aProjectedHarvestOf(string $date)
    {
       $this->date = $date;
    }

    /**
     * @When a scenario sends a harvest request
     * @throws Exception
     */
    public function aScenarioSendsAHarvestRequest()
    {
        $this->response = $this->kernel->handle(
            Request::create('harvest', 'GET', [
                "date" => $this->date
            ])
        );
    }

    /**
     * @Then days till harvest should be :daysTillHarvest
     * @param int $daysTillHarvest
     */
    public function daysTillHarvestShouldBe(int $daysTillHarvest)
    {
        //@todo switch to assertion library

        if($this->response->getContent() !== json_encode(['days_till_harvest' => $daysTillHarvest])) {
            throw new \RuntimeException('Days till harvest did not match expected');
        }
    }
}
