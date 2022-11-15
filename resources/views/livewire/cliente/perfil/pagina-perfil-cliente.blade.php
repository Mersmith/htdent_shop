<div>
    @section('tituloPagina', 'Perfil | ' . $usuario->cliente->nombre)
    <h2 class="cliente_paginas_titulo">MIS DATOS PERSONALES</h2>
    <div class="contenedor_pagina_perfil">
        <form wire:submit.prevent="editarPerfilCliente" enctype="multipart/form-data">
            <div class="contenedor_1_elementos">
                <label>
                    <p>Foto: </p>
                    <div class="contenedor_cambiar_imagen">
                        @if ($nueva_imagen_ruta)
                            <img style="width: 100px; height: 100px;" src="{{ $nueva_imagen_ruta->temporaryUrl() }}">
                        @elseif($imagen_ruta)
                            <img style="width: 100px; height: 100px;"
                                src="{{ Storage::url($usuario->cliente->imagen_ruta) }}">
                        @else
                            <img style="width: 100px; height: 100px;"
                                src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                        @endif
                        <div class="opcion_cambiar">
                            Editar <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>
                    <input type="file" wire:model="nueva_imagen_ruta" style="display: none;">
                </label>
            </div>
            <div class="contenedor_2_elementos">
                <label>
                    <p>Nombre: </p> <input type="text" wire:model="nombre">
                </label>
                <label>
                    <p>Apellido: </p> <input type="text" wire:model="apellido">
                </label>
            </div>
            <div class="contenedor_2_elementos">
                <label>
                    <p>Celular: </p> <input type="text" wire:model="celular">
                </label>
                <label>
                    <p>Puntos: </p> <input type="text" style="background-color: #e9ecef;" disabled
                        value="{{ $usuario->cliente->puntos }}">
                </label>
            </div>
            <div class="contenedor_1_elementos">
                <button type="submit">Actualizar cambios</button>
            </div>
        </form>
    </div>
</div>
