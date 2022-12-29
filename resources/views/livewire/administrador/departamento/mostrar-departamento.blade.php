<div>
    @section('tituloPagina', 'Departamento | ' . $departamento->nombre)
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">DEPARTAMENTO: {{ $departamento->nombre }}</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.departamentos.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <form wire:submit.prevent="guardarProvincia" class="formulario">
            <div class="contenedor_2_elementos">
                <!--Nombre-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Nombre: </p>
                    <input type="text" wire:model="crearFormulario.nombre">
                    @error('crearFormulario.nombre')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Costo-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Costo envío: </p>
                    <input type="number" wire:model="crearFormulario.costo">
                    @error('crearFormulario.costo')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Enviar-->
            <div class="contenedor_1_elementos">
                <input type="submit" value="Crear provincia">
            </div>
        </form>
        <h2 class="contenedor_paginas_titulo">PROVINCIAS</h2>
        @if ($provincias->count())
            <div class="py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Costo</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provincias as $provincia)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $provincia->nombre }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $provincia->costo }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm cursor-pointer">
                                        <a href="{{ route('administrador.provincias.mostrar', $provincia) }}">
                                            <span><i class="fa-solid fa-eye" style="color: #009eff;"></i></span>
                                            Ver
                                        </a>
                                        |
                                        <a wire:click="editarProvinciaModal({{ $provincia }})">
                                            <span><i class="fa-solid fa-pencil" style="color: green;"></i></span>
                                            Editar</a> |
                                        <a wire:click="$emit('eliminarProvinciaModal', {{ $provincia->id }})">
                                            <span><i class="fa-solid fa-trash" style="color: red;"></i></span>
                                            Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="contenedor_no_existe_elementos">
                <p>No hay provincias</p>
                <i class="fa-solid fa-spinner"></i>
            </div>
        @endif
    </div>
    <!--Modal editar provincia -->
    <x-jet-dialog-modal wire:model="editarFormulario.abierto">
        <!--Titulo Modal-->
        <x-slot name="title">
            <div class="contenedor_titulo_modal">
                <div>
                    <h2 style="font-weight: bold">Editar provincia</h2>
                </div>
                <div>
                    <button wire:click="$set('editarFormulario.abierto', false)" wire:loading.attr="disabled">
                        <i style="cursor: pointer; color: #666666;" class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="formulario">
                <!--Nombre-->
                <div class="contenedor_1_elementos_100">
                    <label class="label_principal">
                        <p class="estilo_nombre_input">Nombre: </p>
                        <input type="text" wire:model="editarFormulario.nombre">
                        @error('editarFormulario.nombre')
                            <span>{{ $message }}</span>
                        @enderror
                    </label>
                </div>
                <!--Costo-->
                <div class="contenedor_1_elementos_100">
                    <label class="label_principal">
                        <p class="estilo_nombre_input">Costo: </p>
                        <input type="number" wire:model="editarFormulario.costo">
                        @error('editarFormulario.costo')
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

                <button style="background-color: #ffa03d;" wire:click="actualizarProvincia" wire:loading.attr="disabled"
                    wire:target="actualizarProvincia" type="submit">Editar</button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>

@push('script')
    <script>
        Livewire.on('eliminarProvinciaModal', provinciaId => {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar esta provincia.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('administrador.departamento.mostrar-departamento',
                        'eliminarProvincia', provinciaId);
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
