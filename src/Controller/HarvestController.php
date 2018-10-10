<?php

namespace App\Controller;


use App\Harvest\HarvestFactory;
use App\Harvest\HarvestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HarvestController extends AbstractController
{


    public function index(Request $request, HarvestFactory $factory, HarvestService $service){

        $date = $request->query->get('date', false);
        $daysTillHarvest = null;
        try {
            $harvest = $factory->createHarvestFromDate($date);
            $daysTillHarvest = $service->getDaysTillHarvest($harvest);
        } catch (\Exception $e) {
            // do something
        }

        return new JsonResponse(['days_till_harvest' => $daysTillHarvest]);
    }
}