<div x-data>
    <p>PRODUCTO solO MEDIDA</p>

    <table class="text-gray-600">
        <thead class="border-b border-gray-300">
            <tr class="text-left">
                <th class="py-2">Medida</th>
                <th class="py-2">Stock</th>
                <th class="py-2">Cantidad</th>
                <th class="py-2"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-300">
            @foreach ($medidas as $itemMedida)
                <tr>
                    <td class="py-2">
                        {{ $itemMedida->nombre }}
                    </td>

                    <td>
                        {{ $itemMedida->colores->first()->pivot->stock }}
                    </td>

                    <td class="py-2">
                        <div>
                            <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1"
                                wire:loading.attr="disabled" wire:target="disminuir" wire:click="disminuir">-
                            </x-jet-secondary-button>
                            <span>{{ $cantidadCarrito }}</span>
                            <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= 10"
                                wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
                            </x-jet-secondary-button>
                        </div>
                    </td>

                    <td class="py-2">
                        <button x-on:click="$wire.agregarProducto({{ $itemMedida->id }}, cantidad)">
                            Agregar al carrito
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    var cantidad = 1;

    function aumentarCantidad() {
        return {
            cantidad: cantidad,

            disminuir() {
                this.cantidad--;
            },
            incrementar() {
                this.cantidad++;
            }
        };
    }
</script>
{{-- -
    
     <tr x-data="aumentarCantidad(), cantidad">
                    <td class="py-2">
                        {{ $itemMedida->nombre }}
                    </td>

                    <td>
                        {{ $itemMedida->colores->first()->pivot->stock }}
                    </td>

                    <td class="py-2">
                        <div>
                            <button x-on:click="disminuir()">-</button>
                            <span x-text="cantidad"></span>
                            <button x-on:click="incrementar()">+</button>
                        </div>
                    </td>

                    <td class="py-2">
                        <button x-on:click="$wire.agregarProducto({{ $itemMedida->id }}, cantidad)">
                            Agregar al carrito
                        </button>
                    </td>
                </tr>
    --}}
