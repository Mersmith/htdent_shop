<div wire:init="loadProductos" class="centrar_contenedor_slider_producto">
    @if (count($productos))
        <div id="contenedor_slider_producto">
            <h1 class="slider_producto_titulo">Equipos Odontológicos más vendidos </h1>
            <div class="glider-contain">
                <div class="glider-{{ $slider2 }}">
                    @foreach ($productos as $key => $producto)
                        <div class="item_slider_producto" wire:key="producto-{{ $producto->id }}">
                            <div class="slider_producto_imagen">
                                @if ($producto->imagenes->count())
                                    <img src="{{ Storage::url($producto->imagenes->first()->imagen_ruta) }}"
                                        alt="" />
                                @else
                                    <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                                @endif

                                @livewire('frontend.producto-solo.agregar-favorito-producto', ['producto' => $producto])

                            </div>
                            <div style="text-align: center;">
                                <h2 class="slider_producto_nombre">{{ $producto->nombre }}</h2>
                                <p class="slider_producto_descripcion">{{ Str::limit($producto->descripcion, 35) }} </p>
                            </div>
                            <div style="text-align: center;">
                                <p class="slider_producto_precio">$ {{ number_format($producto->precio, 0, '.', ',') }}
                                </p>
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
    @endif
</div>
