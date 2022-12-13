<div class="contenedor_slider_testimonio_todo">
    <div>
        <h2>Lo que dicen sobre nosotros</h2>
    </div>
    <div class="contenedor_slider_testimonio">
        <div class="contenedor_slider_testimonio_items" id="contenedor_slider_testimonio_items">


            @foreach ($testimonios as $key => $testimonio)
                <div class="slider_testimonio_item">
                    <img src="{{ Storage::url($testimonio->imagenes->first()->imagen_ruta) }}" alt="" />
                    <h3>{{ $testimonio->nombre }}</h3>
                    <span>{{ $testimonio->cargo }}</span>
                    <p>{{ $testimonio->comentario }}</p>
                </div>
            @endforeach

        </div>
        <div class="slider_testimonio_boton" id="boton_izquierdo_slider_testimonio">
            <i class="fa-solid fa-angle-left"></i>
        </div>
        <div class="slider_testimonio_boton" id="boton_derecho_slider_testimonio">
            <i class="fa-solid fa-angle-right"></i>
        </div>
    </div>

</div>
