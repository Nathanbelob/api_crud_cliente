<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UsuarioRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Usuario::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveUsuarios($columns = ['id','name']): Collection
    {
        return Usuario::active()
                            ->get($columns);
    }

    /**
     * @return Usuario
     */
    public static function store($arrayUsuario): Usuario
    {
        return Usuario::create($arrayUsuario);
    }

    /**
     * @return bool
     */
    public static function update($arrayUsuario, $usuario): bool
    {
        return $usuario->update($arrayUsuario);
    }

    /**
     * @return bool
     */
    public static function destroy($usuario): bool
    {
        return $usuario->delete();
    }

}
