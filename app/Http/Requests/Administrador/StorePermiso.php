<?php

namespace App\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class StorePermiso extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'roles' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del Permiso',
            'roles' => 'roles para el Permiso',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el :attribute',
            'roles.required' => 'Debe seleccionar algunos :attribute',
        ];
    }
}
