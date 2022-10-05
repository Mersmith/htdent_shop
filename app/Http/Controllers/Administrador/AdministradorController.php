<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdministradorController extends Controller
{
    public function edit(User $usuario)
    {
        $roles = Role::all();
        return view('administrador.administrador.editar', compact('usuario', 'roles'));
    }

    public function update(Request $request, User $usuario)
    {
        $usuario->roles()->sync($request->roles);
        return back()->with('editar', 'Se agrego Rol correctamente.');
    }

    public function destroy(User $usuario)
    {
    }
};
