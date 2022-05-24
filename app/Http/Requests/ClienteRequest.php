<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class ClienteRequest extends CustomRulesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * @return Array
     */
    public function validateDefault(): Array
    {
        return [
            // Your default validation
        ];
    }

    /**
     * @return Array
     */
    public function validateToStore(): Array
    {
        return [
            'nome' => 'required',
            'cpf' => 'required| max:11',
            'data_nascimento' => 'required|date'
        ];

    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            'nome' => 'required',
            'cpf' => 'max:11',
            'data_nascimento' => 'required|date'
        ];
    }

    /**
     * @return Array
     */
    public function validateToDestroy(): Array
    {
        return [
            // 'id' => 'required',
        ];
    }

        /**
     * @return Array
     */
    public function validateToSearch(): Array
    {
        return [
            'nome' => 'required_without:cpf',
            'cpf' => 'required_without:nome',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            // 'id.required' => 'O id é obrigatório!',
        ];
    }
}
