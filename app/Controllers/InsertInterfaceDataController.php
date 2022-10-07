<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class InsertInterfaceDataController extends AbstractControllers{

    private $params;
    private $attrName;

    public function insertDados(){
        try{
            $response = ['success' => true];

            $this->params = $this->processServerElements->getInputJSONData();

            $this->verificantionInputVar();

            $query = "INSERT INTO usuario (nomeUsuario,sobrenomeUsuario,idade,cpf,celular,fixo) VALUES (:nomeUsuario,:sobrenomeUsuario,:idade,:cpf,:celular,:fixo)";

            $statement = $this->pdo->prepare($query);
            $statement->execute([
                ':nomeUsuario' => $this->params["nomeUsuario"],
                ':sobrenomeUsuario' => $this->params["sobrenomeUsuario"],
                ':idade' => $this->params["idade"],
                ':cpf' => $this->params["cpf"],
                ':celular' => $this->params["celular"],
                ':fixo' => $this->params["fixo"]
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
        if(!$this->params['nomeUsuario']){
            $this->attrName = 'nomeUsuario';
            throw new \Exception('the Nome is send in request');
        }

        if(!$this->params['sobrenomeUsuario']){
            $this->attrName = 'sobrenomeUsuario';
            throw new \Exception('the sobrenome is send in request');
        }

        if(!$this->params['idade']){
            $this->attrName = 'idade';
            throw new \Exception('the idade is send in request');
        }

        if(!$this->params['cpf']){
            $this->attrName = 'cpf';
            throw new \Exception('the cpf is send in request');
        }
    }
}