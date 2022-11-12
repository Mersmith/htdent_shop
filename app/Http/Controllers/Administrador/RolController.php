<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Administrador\StoreRol;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('administrador.rol.index', compact('roles'));
    }

    public function create()
    {
        $permisos = Permission::all();
        return view('administrador.rol.crear', compact('permisos'));
    }

    public function store(StoreRol $request)
    {
        $rol = Role::create([
            'name' => $request->nombre
        ]);

        $rol->permissions()->attach($request->permisos);

        return redirect()->route('administrador.rol.index')->with('crear', 'El Rol se creo correctamente.');
    }    

    public function edit(Role $rol)
    {
        $permisos = Permission::all();
        $rol->load('permissions');

        return view('administrador.rol.editar', compact('rol', 'permisos'));
    }

    public function update(StoreRol $request, Role $rol)
    {
        /*$request->validate([
            'nombre' => 'required',
            'permisos' => 'required',
        ]);*/

        $rol->update([
            'name' => $request->nombre,
        ]);

        $rol->permissions()->sync($request->permisos);

        return back()->with('editar', 'El Rol se edito correctamente, puede regresar.');
    }

    public function destroy(Role $rol)
    {
        $rol->delete();

        return redirect()->route('administrador.rol.index')->with('eliminar', 'El Rol se eliminó correctamente.');
    }
}
