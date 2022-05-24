<?php

namespace App\BO\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\UserHasSystemRequest;

use App\Resources\Traits\PrepareTrait;

/**
 * Cliente trait
 *
 */
trait ClienteTrait
{
    use PrepareTrait;

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareStore(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];

        $returnArray = [];
        $returnArray['nome']            = $requestObject->nome;
        $returnArray['cpf']             = $requestObject->cpf;
        $returnArray['data_nascimento'] = $requestObject->data_nascimento;
        $returnArray['telefone']        = $requestObject->telefone;

        return array_filter($returnArray);
    }

    /**
     * Method responsible for receiving data and preparing them to call the desired method
     *   its name must be the junction of the word prepare with the name of the method that will call it
     *
     * @param array $params
     * @return void
     */
    public function prepareUpdate(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];
        
        $returnArray = [];
        $returnArray['nome']            = $requestObject->nome ?? $classObject->nome;
        $returnArray['cpf']             = $requestObject->cpf ?? $classObject->cpf;
        $returnArray['data_nascimento'] = $requestObject->data_nascimento ?? $classObject->data_nascimento;
        $returnArray['telefone']        = $requestObject->telefone ?? $classObject->telefone;

        return $returnArray;
    }

    public function prepareSearch(array $params)
    {
        $requestObject              = $params['request'];
        $classObject                = $params['object'];
        
        $returnArray = [];
        $returnArray['nome'] = $requestObject->nome;
        $returnArray['cpf']  = $requestObject->cpf;
        return $returnArray;
    }
}
