<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Editar Rol')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">EDITAR ROL</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_crear" style="margin-bottom: 10px;">
        <a class="contenedor_boton_crear" href="{{ route('administrador.rol.index') }}"><i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles_crear">
        <!--Formulario-->
        {!! Form::open(['route' => ['administrador.rol.update', $rol], 'method' => 'put']) !!}
        <!--Nombre-->
        <div class="contenedor_1_elementos estilos_input_text">
            <label>
                <p class="estilo_nombre_input">Nombre: </p>
                {!! Form::text('nombre', $rol->name, ['placeholder' => 'Escribe el nombre']) !!}
                @error('nombre')
                    <span>
                        {{ $message }}
                    </span>
                @enderror
            </label>
        </div>
        <!--Permisos-->
        <div class="contenedor_1_elementos estilos_checkbox">
            <p class="estilo_nombre_input">Permisos: </p>
            @foreach ($permisos as $permiso)
                <div>
                    <label>
                        <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}"
                            @checked($rol->permissions->contains($permiso->id))>
                        {{ $permiso->name }}
                    </label>
                </div>
            @endforeach
            @error('permisos')
                <span>
                    {{ $message }}
                </span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            {!! Form::submit('Editar Rol') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
