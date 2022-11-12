<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Crear Permiso')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">CREAR NUEVO PERMISO</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_crear" style="margin-bottom: 10px;">
        <a class="contenedor_boton_crear" href="{{ route('administrador.permiso.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles_crear">
        <!--Formulario-->
        {!! Form::open(['route' => 'administrador.permiso.store']) !!}
        <!--Nombre-->
        <div class="contenedor_1_elementos estilos_input_text">
            <label>
                <p class="estilo_nombre_input">Nombre: </p>
                {!! Form::text('nombre', null, ['placeholder' => 'Escribe el nombre.']) !!}
                @error('nombre')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Roles-->
        <div class="contenedor_1_elementos estilos_checkbox">
            <p class="estilo_nombre_input">Roles: </p>
            @foreach ($roles as $rol)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $rol->id, null, ['style' => 'margin-top: -2px;']) !!}
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
            {!! Form::submit('Crear Permiso') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
