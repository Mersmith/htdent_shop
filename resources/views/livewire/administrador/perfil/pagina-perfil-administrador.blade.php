<div>
    @section('tituloPagina', 'Administrador | ' . $usuario->administrador->nombre)
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">MIS DATOS PERSONALES</h2>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <form wire:submit.prevent="editarPerfilAdministrador" enctype="multipart/form-data" class="formulario">
            {{-- <div class="contenedor_1_elementos">
                <label>
                    <p>Foto: </p>
                    <div class="contenedor_cambiar_imagen">
                        @if ($nueva_imagen_ruta)
                            <img style="width: 100px; height: 100px;" src="{{ $nueva_imagen_ruta->temporaryUrl() }}">
                        @elseif($imagen_ruta)
                            <img style="width: 100px; height: 100px;"
                                src="{{ Storage::url($usuario->administrador->imagen_ruta) }}">
                        @else
                            <img style="width: 100px; height: 100px;"
                                src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                        @endif
                    </div>
                    <input type="file" wire:model="nueva_imagen_ruta" style="display: none;">
                </label>
            </div> --}}
            <div class="contenedor_2_elementos">
                <!--Nombre-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Nombre: </p> <input type="text" wire:model="nombre">
                </label>
                <!--Apellido-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Apellido: </p> <input type="text" wire:model="apellido">
                </label>
            </div>
            <!--Celular-->
            <div class="contenedor_1_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Celular: </p> <input type="text" wire:model="celular">
                </label>
            </div>
            <div class="contenedor_1_elementos">
                <button type="submit">Actualizar cambios</button>
            </div>
        </form>
    </div>
</div>
