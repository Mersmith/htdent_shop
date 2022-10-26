<div>
    <!--Formulario-->
    <div>
        <!--<form wire:submit.prevent="guardarColor">-->
        <!--Colores-->
        <div class="contenedor_elemento_formulario">
            <label>Colores:</label>
            <div>
                @foreach ($colores as $key => $color)
                    <label style="display: {{ $key == 0 ? 'none' : '' }};">
                        <input type="radio" name="color_id" wire:model.defer="color_id" value="{{ $color->id }}">
                        <span>
                            {{ $color->nombre }}
                        </span>
                    </label>
                @endforeach
            </div>
            @error('color_id')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--Stock-->
        <div class="contenedor_elemento_formulario">
            <label>Stock por color:</label>
            <input type="number" wire:model.defer="stock" step="1" placeholder="Ingrese stock.">
            @error('stock')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
            <!--<input type="submit" value="Agregar Color">-->
            <x-jet-button wire:loading.attr="disabled" wire:target="guardarColor" wire:click="guardarColor">
                Agregar color
            </x-jet-button>
        </div>
    </div>
    <!--Tabla-->
    @if ($producto_colores->count())
        <div class="py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Color</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Stock</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($producto_colores as $producto_color)
                            <tr wire:key="producto_color-{{ $producto_color->pivot->id }}">
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $colores->find($producto_color->pivot->color_id)->nombre }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $producto_color->pivot->stock }} unidad(es)
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                    <button wire:click="editarPivot({{ $producto_color->pivot->id }})"
                                        wire:loading.attr="disabled"
                                        wire:target="editarPivot({{ $producto_color->pivot->id }})"><span><i
                                                class="fa-solid fa-pencil"
                                                style="color: green;"></i></span>Editar</button> |
                                    <button
                                        wire:click="$emit('eliminarPivotColorModal', {{ $producto_color->pivot->id }})">
                                        <span><i class="fa-solid fa-trash"
                                                style="color: red;"></i></span>Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!--Modal editar -->
        <x-jet-dialog-modal wire:model="abierto" wire:key="modal-componente-color-{{ $producto->id }}">
            <!--Titulo Modal-->
            <x-slot name="title">
                <div class="contenedor_titulo_modal">
                    <div>
                        <h2 style="font-weight: bold">Editar color</h2>
                    </div>
                    <div>
                        <button wire:click="$set('abierto', false)" wire:loading.attr="disabled">
                            <i style="cursor: pointer; color: #666666;" class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </x-slot>
            <!--Contenido Modal-->
            <x-slot name="content">
                <!--Stock-->
                <div class="contenedor_elemento_formulario">
                    <label>Stock por color:</label>
                    <input type="number" wire:model="pivot_stock" step="1" placeholder="Ingrese el stock.">
                    @error('pivot_stock')
                        <span>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </x-slot>
            <!--Pie Modal-->
            <x-slot name="footer">
                <div class="contenedor_pie_modal">
                    <button style="background-color: #009eff;" wire:click="$set('abierto', false)"
                        wire:loading.attr="disabled" type="submit">Cancelar</button>

                    <button style="background-color: #ffa03d;" wire:click="actualizarPivot" wire:loading.attr="disabled"
                        wire:target="actualizarPivot" type="submit">Editar</button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
