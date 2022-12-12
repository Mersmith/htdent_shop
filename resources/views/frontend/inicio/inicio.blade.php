<x-frontend-layout>
    @section('tituloPagina', 'Inicio')
    @if ($sliders->count())
        @include('frontend.inicio.slider-principal')
    @endif

    @if ($productos->count())
        @livewire('frontend.productos.slider-producto', ['productos' => $productos])
    @endif

    @include('frontend.inicio.llamada-accion')

    @if ($productos->count())
        @livewire('frontend.productos.slider-producto2', ['productos' => $productos])
    @endif

    @if ($fortalezas->count())
        @include('frontend.inicio.slider-iconos')
    @endif

    @if ($testimonios->count())
        @include('frontend.inicio.slider-testimonio')
    @endif

    @include('frontend.inicio.slider-metodo-pago')
</x-frontend-layout>
