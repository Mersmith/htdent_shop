<x-frontend-layout>
    @section('tituloPagina', 'Inicio')
    @if ($sliders->count())
        @include('frontend.inicio.slider-principal')
    @endif

    @livewire('frontend.productos.slider-producto')

    @include('frontend.inicio.llamada-accion')

    @livewire('frontend.productos.slider-producto2')

    @if ($fortalezas->count())
        @include('frontend.inicio.slider-iconos')
    @endif

    @if ($testimonios->count())
        @include('frontend.inicio.slider-testimonio')
    @endif

    @if ($medios->count())
        @include('frontend.inicio.slider-metodo-pago')
    @endif

    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    draggable: true,
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
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

</x-frontend-layout>
