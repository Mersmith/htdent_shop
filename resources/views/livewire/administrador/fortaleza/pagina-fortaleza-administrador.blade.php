<div>
    @section('tituloPagina', 'Administrador | Fortalezas')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">CREAR NUEVA FORTALEZAS</h2>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <!--Formulario-->
        <form wire:submit.prevent="crearFortaleza" class="formulario">
            <!--Icono-->
            <div class="contenedor_2_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Icono: </p>
                    <input type="text" wire:model="crearFormulario.icono">
                    <code>
                        <?php print htmlentities('<i class="fa-brands fa-facebook"></i>'); ?>
                    </code>
                    @error('crearFormulario.icono')
                        <span>{{ $message }}</span>
                    @enderror
                </label>

                <label class="label_principal">
                    <p class="estilo_nombre_input">Titulo: </p>
                    <input type="text" wire:model="crearFormulario.titulo">
                    @error('crearFormulario.titulo')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Descripción-->
            <div class="contenedor_1_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Descripción: </p>
                    <input type="text" wire:model="crearFormulario.descripcion">
                    @error('crearFormulario.descripcion')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Enviar-->
            <div class="contenedor_1_elementos">
                <input type="submit" value="Crear Fortaleza">
            </div>
        </form>
    </div>
    <!--Cotenedor tabla-->
    <h2 class="contenedor_paginas_titulo">FORTALEZAS</h2>
    @if ($fortalezas->count())
        <div class="py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Titulo</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Descripción</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fortalezas as $fortalezaItem)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span>
                                        {!! $fortalezaItem->icono !!}
                                    </span>
                                    {{ $fortalezaItem->titulo }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $fortalezaItem->descripcion }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm cursor-pointer">
                                    <a wire:click="editarFortaleza('{{ $fortalezaItem->id }}')"><span><i
                                                class="fa-solid fa-pencil" style="color: green;"></i></span>Editar</a> |
                                    <a wire:click="$emit('eliminarFortalezaModal', '{{ $fortalezaItem->id }}')">
                                        <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="contenedor_no_existe_elementos">
            <p>No hay fortalezas</p>
            <i class="fa-solid fa-spinner"></i>
        </div>
    @endif
    <!--Modal editar categoria -->
    <x-jet-dialog-modal wire:model="editarFormulario.abierto">
        <!--Titulo Modal-->
        <x-slot name="title">
            <div class="contenedor_titulo_modal">
                <div>
                    <h2 style="font-weight: bold">Editar categoría</h2>
                </div>
                <div>
                    <button wire:click="$set('editarFormulario.abierto', false)" wire:loading.attr="disabled">
                        <i style="cursor: pointer; color: #666666;" class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        </x-slot>
        <!--Contenido Modal-->
        <x-slot name="content">
            <div class="formulario">
                <!--Icono-->
                <div class="contenedor_elemento_formulario">
                    <label class="label_principal">
                        <p class="estilo_nombre_input">Icono: </p>
                        {{-- <code>
                    <?php print htmlentities('<i class="fa-brands fa-facebook"></i>'); ?>
                </code> --}}
                        <input type="text" wire:model="editarFormulario.icono">
                        @error('editarFormulario.icono')
                            <span>{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <!--Titulo-->
                <div class="contenedor_1_elementos_100">
                    <label class="label_principal">
                        <p class="estilo_nombre_input">Titulo: </p>
                        <input type="text" wire:model="editarFormulario.titulo">
                        @error('editarFormulario.titulo')
                            <span>{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <!--Descripción-->
                <div class="contenedor_1_elementos_100">
                    <label class="label_principal">
                        <p class="estilo_nombre_input">Descripción: </p>
                        <input type="text" wire:model="editarFormulario.descripcion">
                        @error('editarFormulario.descripcion')
                            <span>{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="contenedor_pie_modal">
                <button style="background-color: #009eff;" wire:click="$set('editarFormulario.abierto', false)"
                    wire:loading.attr="disabled" type="submit">Cancelar</button>

                <button style="background-color: #ffa03d;" wire:click="actualizarFortaleza" wire:loading.attr="disabled"
                    wire:target="actualizarFortaleza" type="submit">Editar</button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>

@push('script')
    <script>
        Livewire.on('eliminarFortalezaModal', fortalezaId => {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar esta fortaleza.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('administrador.fortalezas.pagina-fortalezas-administrador',
                        'eliminarFortaleza', fortalezaId);
                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    );
                }
            })
        });
    </script>
@endpush
