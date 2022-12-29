<div class="centrar_contenedor_slider_producto" style="background-color: #009eff; padding: 100px 0px;">
    <div id="contenedor_slider_producto">
        <div class="glider5">
            @foreach ($fortalezas as $key => $fortaleza)
                <div class="item_slider_medios" style="color: white;">
                    <h2  style="font-size: 70px;"> {{!!$fortaleza->icono!!}}</h2>
                    <h3 style="font-size: 20px; font-weight: 600;">{{$fortaleza->titulo}}</h3>
                    <p style="text-align: center;">{{$fortaleza->descripcion}}</p>
                </div>
            @endforeach
        </div>
        <button aria-label="Previous" class="boton_slider_medios glider-prev-5" >
            <i class="fa-solid fa-angle-left" style="color: white;"></i>
        </button>
        <button aria-label="Next" class=" boton_slider_medios glider-next-5">
            <i class="fa-solid fa-angle-right" style="color: white;"></i>
        </button>
    </div>
</div>

<script>
    new Glider(document.querySelector('.glider5'), {
        slidesToShow: 5,
        slidesToScroll: 5,
        draggable: true,
        arrows: {
            prev: '.glider-prev-5',
            next: '.glider-next-5'
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
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }]
    });
</script>
