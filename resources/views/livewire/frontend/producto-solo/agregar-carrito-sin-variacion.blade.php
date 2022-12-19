<div x-data class="contenedor_producto_variacion_sin">
    <div>
        <p><strong>Stock disponible:</strong>
            @if ($stockProducto)
                {{ $stockProducto }}
            @else
                0
            @endif
        </p>
    </div>
    <br>
    <div class="contenedor_producto_variacion_controles_sin">
        <div>
            <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
                wire:target="disminuir" wire:click="disminuir">-
            </x-jet-secondary-button>
            <span>{{ $cantidadCarrito }} </span>
            <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
                wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
            </x-jet-secondary-button>
        </div>
        <button x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto" wire:click="agregarProducto"
            wire:loading.attr="disabled" wire:target="agregarProducto" class="contenedor_producto_variacion_boton">
            Agregar al carrito
        </button>
    </div>
    <br>


    @php
        $witems = Cart::instance('wishlist')
            ->content()
            ->pluck('id');
    @endphp

    @if ($witems->contains($producto->id))
        <button wire:click="agregarFavorito" wire:loading.attr="disabled" wire:target="agregarFavorito"
            style="background: blue;">
            Agregar a favorito
        </button>
    @else
        <button wire:click="agregarFavorito" wire:loading.attr="disabled" wire:target="agregarFavorito"
            class="contenedor_producto_variacion_boton">
            Agregar a favorito
        </button>
    @endif


</div>
