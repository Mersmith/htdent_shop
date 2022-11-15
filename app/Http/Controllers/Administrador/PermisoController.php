<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Administrador\StorePermiso;

class PermisoController extends Controller
{

    public function index()
    {
        $permisos = Permission::all();
        return view('administrador.permiso.index', compact('permisos'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('administrador.permiso.crear', compact('roles'));
    }

    public function store(StorePermiso $request)
    {
        /*$request->validate([
            'nombre' => 'required',
            'roles' => 'required',
        ]);*/

        $permiso = Permission::create([
            'name' => $request->nombre
        ]);

        $permiso->roles()->attach($request->roles);

        return redirect()->route('administrador.permiso.index')->with('crear', 'El Permiso se creo correctamente.');
    }

    public function edit(Permission $permiso)
    {
        $roles = Role::all();

        return view('administrador.permiso.editar', compact('roles', 'permiso'));
    }

    public function update(StorePermiso $request, Permission $permiso)
    {
        /*$request->validate([
            'nombre' => 'required',
            'roles' => 'required',
        ]);*/

        $permiso->update([
            'name' => $request->nombre,
        ]);

        $permiso->roles()->sync($request->roles);

        return back()->with('editar', 'El Rol se edito correctamente.');
    }
    public function destroy(Permission $permiso)
    {
        $permiso->delete();
        
        return redirect()->route('administrador.permiso.index')->with('eliminar', 'El Permiso se eliminó correctamente.');

    }
}
