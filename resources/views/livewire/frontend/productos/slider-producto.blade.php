<div class="centrar_contenedor_slider_producto">
    <div id="contenedor_slider_producto">

        <div id="slider_producto">
    
            @foreach ($productos as $key => $producto)
                <div class="item_slider_producto">
                    <div class="slider_producto_imagen">
                        <img src="{{ asset($producto->imagenes->first()->imagen_ruta) }}" class="slider_imagen">
                        <span> <i class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
                        </span>
                    </div>
                    <h2>{{ $producto->nombre }}</h2>
                    <p>{{ $producto->precio }}</p>
                    <button>Ver mas {{ $key }}</button>
                </div>
            @endforeach
    
        </div>

        <span id="boton_siguiente_producto" class="boton_slider_producto">
            <i class="fa-solid fa-angle-left"></i>
        </span>
        <span id="boton_retroceder_producto" class="boton_slider_producto">
            <i class="fa-solid fa-angle-right"></i>
        </span>
        
    </div>
    
</div>