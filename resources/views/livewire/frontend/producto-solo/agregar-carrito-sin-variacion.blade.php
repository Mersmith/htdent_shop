<div x-data>
    <p>PRODUCTO SOLO</p>
    <div>
        <p>Stock disponible:
            @if ($stockProducto)
                {{ $stockProducto }}
            @else
                0
            @endif
        </p>
        <x-jet-secondary-button disabled x-bind:disabled="$wire.cantidadCarrito <= 1" wire:loading.attr="disabled"
            wire:target="disminuir" wire:click="disminuir">-
        </x-jet-secondary-button>
        <span>{{ $cantidadCarrito }} </span>
        <x-jet-secondary-button x-bind:disabled="$wire.cantidadCarrito >= $wire.stockProducto"
            wire:loading.attr="disabled" wire:target="aumentar" wire:click="aumentar">+
        </x-jet-secondary-button>
    </div>
    <div>
        <button x-bind:disabled="$wire.cantidadCarrito > $wire.stockProducto" wire:click="agregarProducto"
            wire:loading.attr="disabled" wire:target="agregarProducto">
            Agregar al carrito
        </button>
    </div>
</div>
