<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClienteResource;
use App\BO\ClienteBO;

class ClienteController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $clienteBO = new ClienteBO();
        $clientes = $clienteBO->initialize();

        return ClienteResource::collection($clientes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clienteBO = new ClienteBO();
        $clientes = $clienteBO->index();

        return ClienteResource::collection($clientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $clienteBO = new ClienteBO();
        $cliente = $clienteBO->store($request);

        return new ClienteResource($cliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return new ClienteResource($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $clienteBO = new ClienteBO();
        $updated = $clienteBO->update($request, $cliente);

        if ($updated)
        {
            return new ClienteResource($cliente);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $clienteBO = new ClienteBO();
        $clienteBO->destroy($cliente);

        return response()->json("DELETED", 204);
    }

    public function search(ClienteRequest $cliente)
    {
        $clienteBO = new ClienteBO();
        $cliente = $clienteBO->search($cliente);

        return new ClienteResource($cliente);
    }
}
