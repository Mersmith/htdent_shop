<form wire:submit.prevent="guardarColor">
    <!--Colores-->
    <div class="contenedor_elemento_formulario">
        <label for="color_id">Colores:</label>
        <div>
            @foreach ($colores as $color)
                <label>
                    <input type="radio" id="color_id" name="color_id" wire:model.defer="color_id"
                        value="{{ $color->id }}">
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
        <label for="stock">Stock por color:</label>
        <input type="number" wire:model.defer="stock" id="stock" step="1">
        @error('stock')
            <span>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--Enviar-->
    <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
        <input type="submit" value="Agregar Color">
    </div>
</form>

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
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                {{ $colores->find($producto_color->pivot->color_id)->nombre }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                Stock: {{ $producto_color->pivot->stock }}
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                <a><span><i class="fa-solid fa-pencil" style="color: green;"></i></span>Editar</a> |
                                <a>
                                    <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
@endif
