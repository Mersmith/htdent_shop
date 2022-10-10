<div class="container_slider">
    <div class="slider" id="slider">
        @foreach ($sliders as $slider)
            <div class="slider_section">
                <a href="{{$slider->link}}">
                    <img src="{{ asset("$slider->imagen_ruta") }}" class="slider_imagen">
                </a>
            </div>
        @endforeach
    </div>
    <div class="slider_boton" id="boton_izquierdo">
        <i class="fa-solid fa-angle-left"></i>
    </div>
    <div class="slider_boton" id="boton_derecho">
        <i class="fa-solid fa-angle-right"></i>
    </div>
</div>
