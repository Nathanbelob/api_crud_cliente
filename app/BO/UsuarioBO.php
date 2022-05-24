<?php

namespace App\BO;

use App\Repositories\UsuarioRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\BO\Traits\UsuarioTrait;
use App\Models\Usuario;

class UsuarioBO
{
    use UsuarioTrait;

    public function login($request)
    {
        if (!$token = auth()->attempt($request->all())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }

    public function logout()
    {
        if(auth()->logout());
            return true;
        return false;
    }
}
