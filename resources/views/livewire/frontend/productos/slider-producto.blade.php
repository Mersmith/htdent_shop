@php
    $witems = Cart::instance('wishlist')
        ->content()
        ->pluck('id');
@endphp
<div class="centrar_contenedor_slider_producto">
    <div id="contenedor_slider_producto">
        <h1 class="slider_producto_titulo">Equipos Odontológicos más vendidos </h1>
        <div class="glider">
            @foreach ($productos as $key => $producto)
                <div class="item_slider_producto" wire:key="producto-{{ $producto->id }}">
                    <div class="slider_producto_imagen">
                        @if ($producto->imagenes->count())
                            <img src="{{ Storage::url($producto->imagenes->first()->imagen_ruta) }}" alt="" />
                        @else
                            <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                        @endif

                        @if ($witems->contains($producto->id))
                            <span> <i wire:click="eliminarFavorito({{ $producto->id }})" wire:loading.attr="disabled"
                                    wire:target="eliminarFavorito" class="fa-solid fa-heart"
                                    style="color: blue; cursor: pointer;"></i>
                            </span>
                        @else
                            <span> <i wire:click="agregarFavorito({{ $producto }})" wire:loading.attr="disabled"
                                    class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
                            </span>
                        @endif
                    </div>
                    <div style="text-align: center;">
                        <h2 class="slider_producto_nombre">{{ $producto->nombre }}</h2>
                        <p class="slider_producto_descripcion">{{ Str::limit($producto->descripcion, 35) }} </p>
                    </div>
                    <div style="text-align: center;">
                        <p class="slider_producto_precio">${{ $producto->precio }}</p>
                        <button class="slider_producto_boton">
                            <a href="{{ route('producto.index', $producto) }}">
                                Ver más
                            </a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <button aria-label="Previous" class="boton_slider_producto glider-prev">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button aria-label="Next" class=" boton_slider_producto glider-next">
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </div>
</div>
@push('script')
    <script>
        window.livewire.on('reloadClassCSs', function() {
            new Glider(document.querySelector('.glider'), {
                slidesToShow: 5,
                slidesToScroll: 5,
                draggable: true,
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [{
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                }]
            });
        });
    </script>
@endpush
