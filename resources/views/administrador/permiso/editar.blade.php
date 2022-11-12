<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Editar Permiso')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">EDITAR PERMISO</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_crear" style="margin-bottom: 10px;">
        <a class="contenedor_boton_crear" href="{{ route('administrador.permiso.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles_crear">
        <!--Formulario-->
        {!! Form::open(['route' => ['administrador.permiso.update', $permiso], 'method' => 'put']) !!}
        <!--Nombre-->
        <div class="contenedor_1_elementos estilos_input_text">
            <label>
                <p class="estilo_nombre_input">Nombre: </p>
                {!! Form::text('nombre', $permiso->name, ['placeholder' => 'Escribe el nombre.']) !!}
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
                        <input style="margin-top: -2px;" type="checkbox" name="roles[]" value="{{ $rol->id }}"
                            @checked($rol->permissions->contains($permiso->id))>
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
            {!! Form::submit('Editar Permiso') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
