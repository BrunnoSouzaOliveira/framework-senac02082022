<?php

namespace App\FrameworkTools\Implementation\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;

class RouteProcess{

    public static function execute(){
        $processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch($processServerElements->getVerb()){
            case 'GET':
                switch ($processServerElements->getRoute()){

                    case '/hello-world':
                        return (new HelloWorldController)->execute();
                    break;
                }
            case 'POST':
                switch ($processServerElements->getRoute()){

                    case '/hello-rota':
                        return (new HelloWorldController)->execute();
                    break;
                }
        }
    }
}