<x-administrador-layout>
    @section('tituloPagina', 'CREAR ADMINISTRADOR')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">CREAR NUEVO ADMINISTRADOR</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_crear" style="margin-bottom: 10px;">
        <a class="contenedor_boton_crear" href="{{ route('administrador.administrador.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles_crear">
        <!--Formulario-->
        {!! Form::open(['route' => 'administrador.administrador.store']) !!}
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
        <!--Correo-->
        <div class="contenedor_1_elementos estilos_input_text">
            <label>
                <p class="estilo_nombre_input">Correo: </p>
                {!! Form::email('email', null, ['placeholder' => 'Escribe el correo.']) !!}
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Contraseña-->
        <div class="contenedor_1_elementos estilos_input_text">
            <label>
                <p class="estilo_nombre_input">Contraseña: </p>
                {!! Form::password('password', ['placeholder' => 'Escribe la contraseña.']) !!}
                @error('password')
                    <span>{{ $message }}</span>
                @enderror
            </label>
        </div>
        <!--Enviar-->
        <div class="contenedor_1_elementos">
            {!! Form::submit('Crear Administrador') !!}
        </div>
        {!! Form::close() !!}
    </div>
</x-administrador-layout>
