<div class="centrar_contenedor_slider_producto">
    <div id="contenedor_slider_producto2">
        <h1 class="slider_producto_titulo">Nuevos equipos</h1>

        <div id="slider_producto2">

            @foreach ($productos as $key => $producto)
                <div class="item_slider_producto2">
                    <div class="slider_producto_imagen">
                        @if ($producto->imagenes->count())
                            <img class="slider_imagen" src="{{ Storage::url($producto->imagenes->first()->imagen_ruta) }}"
                                alt="" />
                        @else
                            <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                        @endif
                        <span> <i class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
                        </span>
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

        <span id="boton_siguiente_producto2" class="boton_slider_producto2">
            <i class="fa-solid fa-angle-left"></i>
        </span>
        <span id="boton_retroceder_producto2" class="boton_slider_producto2">
            <i class="fa-solid fa-angle-right"></i>
        </span>

    </div>

</div>
