<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Asignar Rol')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">ASIGNAR ROL A {{ $usuario->administrador->nombre }}</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_crear" style="margin-bottom: 10px;">
        <a class="contenedor_boton_crear" href="{{ route('administrador.administrador.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles_crear">

        <!--Formulario-->

        {!! Form::model($usuario, ['route' => ['administrador.administrador.update', $usuario], 'method' => 'put']) !!}
        <!--Roles-->
        <div class="contenedor_1_elementos estilos_checkbox">
            <p class="estilo_nombre_input">Roles: </p>
            @foreach ($roles as $rol)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $rol->id, null, []) !!}
                        {{ $rol->name }}
                    </label>
                </div>
            @endforeach
            @error('roles')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            {!! Form::submit('Asignar Roles') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
