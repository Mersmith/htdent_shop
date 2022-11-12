<?php

namespace App\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class StoreRol extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'permisos' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del Rol',
            'permisos' => 'permisos del Rol',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el :attribute',
            'permisos.required' => 'Debe seleccionar algunos :attribute',
        ];
    }
}
