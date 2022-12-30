<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function registrar(Request $request)
    {
        /*
        http://127.0.0.1:8000/api/registrar
        {
            "name":"Smith",
            "email":"smith770@gmail.com",
            "password": "123456789",
            "password_confirmation": "123456789"
        }*/

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return response($usuario, Response::HTTP_CREATED);
    }
    public function ingresar(Request $request)
    {
        /*
        http://127.0.0.1:8000/api/ingresar
        {
            "email":"smith770@gmail.com",
            "password": "123456789"
        }
        */
        $credenciales = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credenciales)) {
            $usuario = Auth::user();
            $token = $usuario->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response(["token" => $token], Response::HTTP_OK)->withoutCookie($cookie);
        } else {
            return response(["mensaje" => "Credenciales inválidas"], Response::HTTP_UNAUTHORIZED);
        }
    }
    public function usuarioPerfil(Request $request)
    {
        /*
        http://127.0.0.1:8000/api/usuario-perfil
        {
            "email":"smith770@gmail.com",
            "password": "123456789"
        }
        */

        return response()->json([
            "mensaje" => "Perfil del usuario, exitoso.",
            "usuarioData" => auth()->user()
        ], Response::HTTP_OK);
    }
    public function cerrarSesion()
    {
        /*
        http://127.0.0.1:8000/api/cerrar-sesion
        */

        Auth::user()->tokens()->delete();
        $cookie = Cookie::forget('cookie_token');
        return response(["mensaje" => "Cierre de sesión, exitoso."], Response::HTTP_OK)->withCookie($cookie);
    }
    public function todosUsuarios(Request $request)
    {
        /*
        http://127.0.0.1:8000/api/todos-usuarios
        http://127.0.0.1:8000/api/todos-usuarios?verificados=si
        */

        if ($request->has('verificados')) {
            $estadoVerificado = $request->query('verificados');
            if ($estadoVerificado == "si") {
                $usuarios = User::where('email_verified_at', '!=', null)->get();
            } else {
                $usuarios = User::where('email_verified_at', '=', null)->get();
            }
        } else {
            $usuarios = User::all();
        }
        return response()->json([
            "usuarios" => $usuarios
        ]);
    }
    public function unUsuario(Request $request)
    {
        /*
        http://127.0.0.1:8000/api/usuario
        */

        //$usuario = User::where('email','LIKE',"%{$request->email}%")->get();
        $usuario = User::where('email', '=', $request->email)->first();
        return response(["mensaje" =>  $usuario]);
    }
}
