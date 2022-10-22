<div class="contenedor_pagina_administrador">
    <!--Cotenedor formulario-->
    <div class="titulo_pagina">
        <h2>Crear Subcategoria</h2>
    </div>
    <div class="contenedor_formulario">
        <form wire:submit.prevent="crearSubcategoria">
            <!--Nombre-->
            <div class="contenedor_elemento_formulario">
                <label for="crearFormulario.nombre">Nombre:</label>
                <input type="text" wire:model="crearFormulario.nombre" id="crearFormulario.nombre">
                @error('crearFormulario.nombre')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Ruta-->
            <div class="contenedor_elemento_formulario">
                <label for="crearFormulario.slug">Ruta:</label>
                <input type="text" wire:model="crearFormulario.slug" id="crearFormulario.slug">
                @error('crearFormulario.slug')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Color-->
            <div class="contenedor_elemento_formulario">
                <label for="crearFormulario.slug">¿Tiene color?:</label>
                <div class="contenedor_formulario_checkbox">
                    <label>
                        <input type="radio" value="1" name="tiene_color"
                            wire:model.defer="crearFormulario.tiene_color">
                        Si
                    </label>

                    <label>
                        <input type="radio" value="0" name="tiene_color"
                            wire:model.defer="crearFormulario.tiene_color">
                        No
                    </label>
                </div>
                @error('crearFormulario.tiene_color')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Medida-->
            <div class="contenedor_elemento_formulario">
                <label for="crearFormulario.slug">¿Tiene medida?:</label>
                <div class="contenedor_formulario_checkbox">
                    <label>
                        <input type="radio" value="1" name="tiene_medida"
                            wire:model.defer="crearFormulario.tiene_medida">
                        Si
                    </label>

                    <label>
                        <input type="radio" value="0" name="tiene_medida"
                            wire:model.defer="crearFormulario.tiene_medida">
                        No
                    </label>
                </div>
                @error('crearFormulario.tiene_medida')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Enviar-->
            <div class="contenedor_elemento_formulario formulario_boton_enviar">
                <input type="submit" value="Crear Subcategoria">
            </div>
        </form>
    </div>
    <!--Cotenedor tabla-->
    <div class="titulo_pagina">
        <h2>Subcategorias</h2>
    </div>
    <div class="py-4 overflow-x-auto">
        <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Nombre</th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Acción</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $subcategoria->nombre }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                <a wire:click="editarSubcategoria('{{ $subcategoria->id }}')"><span><i
                                            class="fa-solid fa-pencil" style="color: green;"></i></span>Editar</a> |
                                <a wire:click="$emit('eliminarSubcategoriaModal', '{{ $subcategoria->id }}')">
                                    <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--Modal editar categoria -->
    <x-jet-dialog-modal wire:model="editarFormulario.abierto">
        <x-slot name="title">
            <div class="contenedor_titulo_modal">
                <div>
                    <h2 style="font-weight: bold">Editar subcategoría</h2>
                </div>
                <div>
                    <button wire:click="$set('editarFormulario.abierto', false)" wire:loading.attr="disabled">
                        <i style="cursor: pointer; color: #666666;" class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="contenedor_formulario">
                <!--Nombre-->
                <div class="contenedor_elemento_formulario">
                    <label for="editarFormulario.nombre">Nombre:</label>
                    <input type="text" wire:model="editarFormulario.nombre" id="editarFormulario.nombre">
                    @error('editarFormulario.nombre')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--Ruta-->
                <div class="contenedor_elemento_formulario">
                    <label for="editarFormulario.slug">Ruta:</label>
                    <input type="text" wire:model="editarFormulario.slug" id="editarFormulario.slug">
                    @error('editarFormulario.slug')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--Color-->
                <div class="contenedor_elemento_formulario">
                    <label for="editarFormulario.tiene_color">¿Tiene color?:</label>
                    <div class="contenedor_formulario_checkbox">
                        <label>
                            <input type="radio" value="1" name="editarFormulario.tiene_color" wire:model.defer="editarFormulario.tiene_color">
                            Si
                        </label>

                        <label>
                            <input type="radio" value="0" name="editarFormulario.tiene_color" wire:model.defer="editarFormulario.tiene_color">
                            No
                        </label>
                    </div>
                    @error('editarFormulario.tiene_color')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!--Medida-->
                <div class="contenedor_elemento_formulario">
                    <label for="editarFormulario.tiene_medida">¿Tiene medida?:</label>
                    <div class="contenedor_formulario_checkbox">
                        <label>
                            <input type="radio" value="1" name="editarFormulario.tiene_medida" wire:model.defer="editarFormulario.tiene_medida">
                            Si
                        </label>

                        <label>
                            <input type="radio" value="0" name="editarFormulario.tiene_medida" wire:model.defer="editarFormulario.tiene_medida">
                            No
                        </label>
                    </div>
                    @error('editarFormulario.tiene_medida')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <div class="contenedor_pie_modal">
                <button style="background-color: #009eff;" wire:click="$set('editarFormulario.abierto', false)"
                    wire:loading.attr="disabled" type="submit">Cancelar</button>

                <button style="background-color: #ffa03d;" wire:click="actualizarSubcategoria"
                    wire:loading.attr="disabled" wire:target="actualizarCategoria" type="submit">Editar</button>
            </div>
        </x-slot>

    </x-jet-dialog-modal>
</div>

@push('script')
    <script>
        Livewire.on('eliminarSubcategoriaModal', subcategoriaId => {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar esta subcategoria.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('administrador.subcategoria.pagina-subcategoria-administrador',
                        'eliminarSubcategoria', subcategoriaId);
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
