<div>
    <!--Formulario-->
    <form wire:submit.prevent="guardarPivot">
        <!--Stock-->
        <div class="contenedor_elemento_formulario">
            <label for="stock">Stock por medida:</label>
            <input type="number" wire:model.defer="stock" id="stock" step="1" placeholder="Ingrese el stock.">
            @error('stock')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
            <input type="submit" value="Agregar stock">
        </div>
    </form>
    <!--Tabla-->
    @if ($medida_colores->count())
        <div class="py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Medida</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Stock</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medida_colores as $medida_color)
                            <tr wire:key="medida_color-{{ $medida_color->pivot->id }}">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $medida->nombre }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $medida_color->pivot->stock }} unidad(es)
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                    <button wire:click="editarPivot({{ $medida_color->pivot->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="editarPivot({{ $medida_color->pivot->id }})">
                                        <span><i class="fa-solid fa-pencil" style="color: green;"></i></span>Editar
                                    </button>
                                    |
                                    <button wire:click="$emit('eliminarPivot', {{ $medida_color->pivot->id }})">
                                        <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    @endif

    <!--Modal editar -->
    <x-jet-dialog-modal wire:model="abierto">
        <!--Titulo Modal-->
        <x-slot name="title">
            <div class="contenedor_modal">
                <h2>Editar Color</h2>
                <button wire:click="$set('abierto', false)" wire:loading.attr="disabled">
                    x
                </button>
            </div>
        </x-slot>
        <!--Contenido Modal-->
        <x-slot name="content">

            <!--Stock-->
            <div class="contenedor_elemento_formulario">
                <label for="pivot_stock">Stock por medida:</label>
                <input type="number" wire:model="pivot_stock" id="pivot_stock" step="1"
                    placeholder="Ingrese el stock.">
                @error('pivot_stock')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <button wire:click="actualizarPivot" wire:loading.attr="disabled" wire:target="actualizarPivot"
                type="submit">
                Actualizar
            </button>
            <button wire:click="$set('abierto', false)" wire:loading.attr="disabled" type="submit">Cancelar</button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
