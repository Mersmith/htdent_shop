<?php

namespace App\Http\Requests\Administrador;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministrador extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min_digits:8',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'nombre del Administrador',
            'email' => 'correo del Administrador',
            'password' => 'contraseña del Administrador',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Debe ingresar el :attribute',
            'email.required' => 'Debe ingresar el :attribute',
            'email.email' => 'Debe ser válido el :attribute',
            'email.unique' => 'Debe ingresar otro :attribute',
            'password.required' => 'Debe ingresar la :attribute',
            'password.min_digits' => 'Debe ingresar más dígitos para la :attribute',
        ];
    }
}
