<div class="centrar_contenedor_slider_producto">
    <div id="contenedor_slider_producto">
        <h1 class="slider_titulo_medios">MEDIOS DE PAGO</h1>
        <div class="glider3">
            @foreach ($medios as $key => $medio)
                <div class="item_slider_medios">
                    <img style="height: 50px !important;" src="{{ Storage::url($medio->imagenes->first()->imagen_ruta) }}" alt="" />
                </div>
            @endforeach
        </div>
        <button aria-label="Previous" class="boton_slider_medios glider-prev-3">
            <i class="fa-solid fa-angle-left"></i>
        </button>
        <button aria-label="Next" class=" boton_slider_medios glider-next-3">
            <i class="fa-solid fa-angle-right"></i>
        </button>
    </div>
</div>

<script>
    new Glider(document.querySelector('.glider3'), {
        slidesToShow: 5,
        slidesToScroll: 5,
        draggable: true,
        arrows: {
            prev: '.glider-prev-3',
            next: '.glider-next-3'
        },
        responsive: [{
            breakpoint: 300,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 6,
                slidesToScroll: 6
            }
        }]
    });
</script>
