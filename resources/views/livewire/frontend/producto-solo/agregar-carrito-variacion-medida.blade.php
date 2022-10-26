<div x-data>
    <p>PRODUCTO solO MEDIDA</p>
    @if ($medida_id)
        <h1>
            Medida id: {{ $medida_id }}
        </h1>

        @if ($stockProducto)
            <p>Stock disponible:{{ $stockProducto }}</p>
        @else
            <p> 0</p>
        @endif
    @endif
    <h2>Cantida Carrito: {{ $cantidadCarrito }}</h2>

    @foreach ($medidas as $key => $itemMedida)
        <div style="display: flex;">
            <label style="display: flex;" for="medida_id-{{ $key }}">
                <input type="radio" value="{{ $itemMedida->id }}" name="medida_id" wire:model="medida_id"
                    id="medida_id-{{ $key }}">
                <div class="py-2">
                    {{ $itemMedida->nombre }}
                </div>
                <div>
                    {{-- $itemMedida->colores->first()->pivot->stock --}}
                    <span></span>
                </div>

                <div x-bind:class=" $wire.medida_id != {{ $itemMedida->id }} ? 'hidden' : ''">

                    <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1"
                        wire:loading.attr="disabled" wire:target="disminuir" wire:click="disminuir">-
                    </x-jet-secondary-button>


                    @if ($medida_id == $itemMedida->id)
                        <span>{{ $cantidadCarrito }}</span>
                    @else
                        <span>1</span>
                    @endif


                    <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
                        wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
                    </x-jet-secondary-button>

                    <div class="py-2">

                        <button x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto"
                            x-bind:disabled="!$wire.stockProducto" wire:click="agregarProducto"
                            wire:loading.attr="disabled" wire:target="agregarProducto" color="orange">
                            Agregar al carrito
                        </button>

                    </div>
                </div>
                @if (!$medida_id)
                    <x-jet-secondary-button disabled>-</x-jet-secondary-button>
                    <span>1</span>
                    <x-jet-secondary-button disabled>+</x-jet-secondary-button>
                    <button disabled>
                        Agregar al carrito
                    </button>
                @endif

                @if ($medida_id)
                    @if ($medida_id == $itemMedida->id)
                    @else
                        <x-jet-secondary-button disabled>-</x-jet-secondary-button>
                        <span>1</span>
                        <x-jet-secondary-button disabled>+</x-jet-secondary-button>
                        <button disabled>
                            Agregar al carrito
                        </button>
                    @endif
                @endif


            </label>
        </div>
    @endforeach
</div>
