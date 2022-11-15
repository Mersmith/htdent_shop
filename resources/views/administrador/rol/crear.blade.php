<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Crear Rol')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">CREAR NUEVO ROL</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.rol.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <!--Formulario-->
        {!! Form::open(['route' => 'administrador.rol.store', 'class' => 'formulario']) !!}
        <!--Nombre-->
        <div class="contenedor_1_elementos">
            <label class="label_principal">
                <p class="estilo_nombre_input">Nombre: </p>
                {!! Form::text('nombre', null, ['placeholder' => 'Escribe el nombre.']) !!}
                @error('nombre')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </label>
        </div>
        <!--Permisos-->
        <div class="contenedor_1_elementos">
            <label class="label_principal">
                <p class="estilo_nombre_input">Permisos: </p>
                @foreach ($permisos as $permiso)
                    <div>
                        <label>
                            {!! Form::checkbox('permisos[]', $permiso->id, null, ['style' => 'margin-top: -2px;']) !!}
                            {{ $permiso->name }}
                        </label>
                    </div>
                @endforeach
                @error('permisos')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </label>
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            {!! Form::submit('Crear Rol') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
