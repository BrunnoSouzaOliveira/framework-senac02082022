<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class Brunno extends AbstractControllers{

    private $params;
    private $attrName;

    public function Oliveira1() {
        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM petshop;")
                ->fetchAll();

        view($users);
    }

    public function Oliveira2() {
        try{
        $response = ['success' => true];

            $this->params = $this->processServerElements->getInputJSONData();

            $this->verificantionInputVar();

            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name_pet' => $this->params["name_pet"],
                ':type_service' => $this->params["type_service"]
            ]);

        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);
    }
    private function verificantionInputVar(){
        if(!$this->params['name_pet']){
            $this->attrName = 'name_pet';
            throw new \Exception('the name_pet is send in request');
        }

        if(!$this->params['type_service']){
            $this->attrName = 'type_service';
            throw new \Exception('the type_service is send in request');
        }
    }
}