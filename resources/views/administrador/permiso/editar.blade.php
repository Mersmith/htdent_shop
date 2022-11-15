<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Editar Permiso')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">EDITAR PERMISO</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.permiso.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <!--Formulario-->
        {!! Form::open([
            'route' => ['administrador.permiso.update', $permiso],
            'method' => 'put',
            'class' => 'formulario',
        ]) !!}
        <!--Nombre-->
        <div class="contenedor_1_elementos">
            <label class="label_principal">
                <p class="estilo_nombre_input">Nombre: </p>
                {!! Form::text('nombre', $permiso->name, ['placeholder' => 'Escribe el nombre.']) !!}
                @error('nombre')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Roles-->
        <div class="contenedor_1_elementos">
            <label class="label_principal">
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
            </label>
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            {!! Form::submit('Editar Permiso') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
