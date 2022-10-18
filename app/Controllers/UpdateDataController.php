<?php

namespace App\Controllers;

use  App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers{
    public function exec(){
        $missingAttribute;
        $userId = null;
        $response = ['success' => true];

        try{
            $requestVariables = $this->processServerElements->getVariables();

            if((!$requestVariables) || sizeof($requestVariables) === 0){
                $missingAttribute = 'variableIsEmpty';
                throw new \Exception("You need to insert variables in the url");
            }

            foreach($requestVariables as $requestVariable){
                if($requestVariable['name'] === 'userId'){
                    $userId = $requestVariable['value'];
                }
            }

            if(!$userId){
                $missingAttribute = 'userIdNull';
                throw new \Exception("You need to inform userID variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")
                ->fetchAll();

            if(sizeof($users) === 0){
                $missingAttribute = 'thisUserDoesNotExist';
                throw new \Exception("There is no record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();

            $query = "UPDATE  user SET (name,last_name,age) WHERE id_user = '{$userId}';";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':name' => $this->params["name"],
                ':last_name' => $this->params["last_name"],
                ':age' => $this->params["age"]
            ]);


        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }
        view($response);
    }
}