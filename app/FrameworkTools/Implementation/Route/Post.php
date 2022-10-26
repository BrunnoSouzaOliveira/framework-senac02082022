<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\InsertDataController;
use App\Controllers\InsertDataControllerCar;
use App\Controllers\InsertInterfaceDataController;
use App\Controllers\Brunno;

trait Post{
    public static function post(){
        switch(self::$processServerElements->getRoute()){

            case '/brunno-post':
                return (new Brunno)->Oliveira2();
            break;
            case '/insert-data':
                return (new InsertDataController)->exec();
            break;
            case '/carinsert':
                return (new InsertDataControllerCar)->insereCarro();
            break;
            case '/insert-on-interface':
                return (new InsertInterfaceDataController)->insertDados();
            break;
        }
    }
}