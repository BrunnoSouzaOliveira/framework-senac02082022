<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\InsertDataController;
use App\Controllers\InsertDataControllerCar;
use App\Controllers\InsertInterfaceDataController;

trait Post{
    public static function post(){
        switch(self::$processServerElements->getRoute()){
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