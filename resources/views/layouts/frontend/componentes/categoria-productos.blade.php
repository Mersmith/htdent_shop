<main class=" text-white flex items-center justify-center" x-data="carouselFilter()">
    <div class="container grid grid-cols-1">
        <div class="row-start-1 col-start-1" x-show="active == 0" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-90"
            x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-90">
            @if (count($productos))

                <div class="grid grid-cols-1 grid-rows-1" x-data="carousel()" x-init="init()">
                    <div class="carousel col-start-1 row-start-1" x-ref="carousel">

                        @foreach ($productos as $producto)
                            <div class="w-1/3 contenedor_categoria px-2">

                                <figure class="contenido_imagenes">
                                    <img class="imagenes" src="{{ Storage::url($producto->imagenes->first()->url) }}"
                                        alt="">
                                </figure>

                                <h2 class="nombres_Producto">
                                    <a href="{{ route('productos.mostrar', $producto) }}">
                                        <b> {{ Str::limit($producto->nombre, 12) }}</b>
                                    </a>
                                </h2>
                                <p class="contenido_producto">{{ Str::limit($producto->descripcion, 120) }} </p>
                                <p class="precio">$. {{ $producto->precio }} </p>
                                <a class="boton"href="{{ route('productos.mostrar', $producto) }}">Ver
                                    más</a>

                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
