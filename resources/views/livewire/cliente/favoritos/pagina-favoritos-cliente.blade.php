<div class="col-span-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse (Cart::instance('wishlist')->content() as $item)
            <div class="item_slider_producto" style="margin-bottom: 30px;">
                <div class="slider_producto_imagen">
                    <img src="{{ $item->options->imagen }}" alt="">
                    <span> <i wire:click="eliminarFavorito('{{ $item->rowId }}')"
                            wire:loading.class="text-red-600 opacity-25"
                            wire:target="eliminarFavorito('{{ $item->rowId }}')" class="fa-solid fa-heart"
                            style="color: blue; cursor: pointer;"></i>
                    </span>
                </div>
                <div style="text-align: center;">
                    <h2 class="slider_producto_nombre">{{ $item->name }}</h2>
                </div>
                <div style="text-align: center;">
                    <p class="slider_producto_precio">${{ $item->price }}</p>
                    <button class="slider_producto_boton">
                        <a href="{{ route('producto.index', $item->id) }}">
                            Ver más
                        </a>
                    </button>
                </div>
            </div>
        @empty
            <div class="contenedor_no_existe_elementos">
                <p>No tienes favoritos</p>
                <i class="fa-solid fa-spinner"></i>
            </div>
        @endforelse
    </div>
</div>
