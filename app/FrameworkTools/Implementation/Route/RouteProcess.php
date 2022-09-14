<?php

namespace App\FrameworkTools\Implementation\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;
use App\Controllers\TestQuestionsController;
use App\Controllers\InsertDataController;

class RouteProcess {

    public static function execute() {
        $processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch ($processServerElements->getVerb()) {
            case 'GET':

                switch ($processServerElements->getRoute()) {

                    case '/hello-world':
                        return (new HelloWorldController)->execute();
                    break;

                    case '/train-query':
                        return (new TrainQueryController)->execute();
                    break;

                    case '/car':
                        return (new TestQuestionsController)->getCar();
                    break;

                    case '/car/id-by-car':
                        return (new TestQuestionsController)->getCar_Id();
                    break;

                    case '/car/name-by-car':
                        return (new TestQuestionsController)->getCarName();
                    break;

                    case '/seller':
                        return (new TestQuestionsController)->getSeller();
                    break;

                    case '/seller/id-by-seller':
                        return (new TestQuestionsController)->getSeller_Id();
                    break;

                    case '/seller/name-by-seller':
                        return (new TestQuestionsController)->getSellerName();
                    break;

                    case '/seller/get-all-car-by-seller':
                        return (new TestQuestionsController)->getSellsFromSeller();
                    break;

                    case '/buyer':
                        return (new TestQuestionsController)->getBuyer();
                    break;

                    case '/buyer/id-by-buyer':
                        return (new TestQuestionsController)->getBuyer_Id();
                    break;

                    case '/buyer/name-by-buyer':
                        return (new TestQuestionsController)->getBuyerName();
                    break;

                    case '/buyer/get-all-cars':
                        return (new TestQuestionsController)->getBuyerCars();
                    break;
                }
            break;

            case 'POST':
                switch ($processServerElements->getRoute()) {
                    case '/insert-data':
                        return (new InsertDataController)->exec();
                    break;
                }
            break;
        }

    }

}