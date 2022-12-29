<div class="centrar_contenedor_slider_producto">
    <div id="contenedor_slider_producto">
        <h2
            style="color: #343434;
        text-align: center;
        font-size: 40px;
        font-weight: 600;
        margin-bottom: 50px;">
            Lo que dicen sobre nosotros</h2>
        <div class="glider6">
            @foreach ($testimonios as $key => $testimonio)
                <div class="item_slider_medios">

                    <img style="width: 200px;
                        height: 200px; object-fit: cover;
  border: 1px solid #666666;"
                        src="{{ Storage::url($testimonio->imagenes->first()->imagen_ruta) }}" alt="" />
                    <h3
                        style="color: #282828;
                    font-size: 25px;
                    font-weight: 600;
                    margin-top: 15px;
                    text-align: center;
                    letter-spacing: 2px;">
                        {{ $testimonio->nombre }}</h3>
                    <span
                        style="color: #666666;
                    font-size: 20px;
                    margin-top: -8px;
                    margin-bottom: 5px;
                    font-weight: 500;
                    text-align: center;">{{ $testimonio->cargo }}</span>
                    <p style="text-align: center; width: 80%;">{{ $testimonio->comentario }}</p>
                </div>
            @endforeach
        </div>
        <button aria-label="Previous" style="top: calc(66% - 65px);" class="boton_slider_medios glider-prev-6">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button aria-label="Next" style="top: calc(66% - 65px);" class=" boton_slider_medios glider-next-6">
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </div>
</div>


<script>
    new Glider(document.querySelector('.glider6'), {
        slidesToShow: 5,
        slidesToScroll: 5,
        draggable: true,
        arrows: {
            prev: '.glider-prev-6',
            next: '.glider-next-6'
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
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
</script>
