<?php

namespace App\Controller;


use App\Harvest\HarvestFactory;
use App\Harvest\HarvestService;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HarvestController extends AbstractController
{
    public function index(Request $request, HarvestFactory $factory, HarvestService $service){

        $date = $request->query->get('date', false);

        try {

            $harvest = $factory->createHarvestFromDate($date);
            $daysTillHarvest = $service->getDaysTillHarvest($harvest);

        } catch(InvalidArgumentException $ie) {

            // @todo 'Whoops' leaks service details, fix before production usage.

            throw new HttpException(Response::HTTP_BAD_REQUEST, $ie->getMessage());
        }

        return new JsonResponse(['days_till_harvest' => $daysTillHarvest]);
    }
}