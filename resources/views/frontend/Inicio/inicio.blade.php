<x-frontend-layout>
    @section('tituloPagina', 'Inicio')
    @include('frontend.inicio.slider-principal')

   @livewire('frontend.productos.slider-producto', ['productos' => $productos])



    <h1>Pagina Inicio</h1>
    <div>Slider</div>
    <div>Categorias</div>
</x-frontend-layout>
