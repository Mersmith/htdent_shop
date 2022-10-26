<x-frontend-layout>
    @section('tituloPagina', 'Producto | ' . $producto->nombre)
    <div class="contenedor_pagina_producto">
        <div class="contenedor_info_producto">
            <div class="contenedor_producto_imagen">
                @if ($producto->imagenes->count())

                    <div x-data="{ total: {{ $producto->imagenes->count() }}, current: 0, open: true }">

                        <div x-show="open" class="contenedor_imagen_producto_principal">
                            @foreach ($producto->imagenes as $key => $imagen)
                                <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt=""
                                    x-show="current == {{ $key }}">
                            @endforeach
                            <span> <i class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
                            </span>

                            <div class="contenedor_imagen_pie_controles contenedor_imagen_pie_izquierdo">
                                <span @click="if(current >= 1){ current = current - 1}"><i
                                        class="fa-solid fa-angle-left"></i></span>
                            </div>
                            <div class="contenedor_imagen_pie_controles contenedor_imagen_pie_derecho"
                                contenedor_imagen_pie_derecho>
                                <span @click="if(current < total-1){ current = current + 1}"><i
                                        class="fa-solid fa-angle-right"></i></span>
                            </div>
                        </div>

                        <div class="contenedor_imagen_producto_pie">
                            <div class="contenedor_imagen_producto_item">
                                @foreach ($producto->imagenes as $key => $imagen)
                                    <div style="cursor: pointer;">
                                        <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt=""
                                            @click="current = {{ $key }}, open = true">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                @endif

            </div>

            <div class="contenedor_producto_info">
                <h1>{{ $producto->nombre }} </h1>
                <p>{{ $producto->sku }} </p>
                <p>USD {{ $producto->precio }} </p>
                <h2>Ganas {{ $producto->puntos_ganar }} puntos </h2>

                <div>
                    @if ($producto->subcategoria->tiene_color && !$producto->subcategoria->tiene_medida)
                        <code>El producto varia en Color</code>
                        @livewire('frontend.producto-solo.agregar-carrito-variacion-color', ['producto' => $producto])
                    @elseif(!$producto->subcategoria->tiene_color && $producto->subcategoria->tiene_medida)
                        <code>El producto varia en Medida</code>
                        @livewire('frontend.producto-solo.agregar-carrito-variacion-medida', ['producto' => $producto])

                    @elseif($producto->subcategoria->tiene_color && $producto->subcategoria->tiene_medida)
                        <code>El producto varia en Color y Medida</code>
                        @livewire('frontend.producto-solo.agregar-carrito-variacion-medida-color', ['producto' => $producto])

                    @else
                        <code>El producto No tiene Variación</code>
                        @livewire('frontend.producto-solo.agregar-carrito-sin-variacion', ['producto' => $producto])
                    @endif
                </div>

                <p>{!! html_entity_decode($producto->informacion) !!}</p>
            </div>
        </div>
        @if ($producto->link_video)
            <div class="contenedor_producto_video">
                <div>
                    video
                </div>
            </div>
        @endif

        @if ($producto->tiene_detalle)
            <div class="contenedor_producto_detalles">
                <div>
                    <div class="tabla_infoproducto">{!! html_entity_decode($producto->detalle) !!}</div>
                </div>
            </div>
        @endif

        <div>
            <p>Componente comentarios</p>
        </div>
        <div>
            <p>Componente slider productos</p>
        </div>
        <div>
            <p>Componente slider pagos</p>
        </div>
    </div>

    @push('script')
        <script></script>
    @endpush
</x-frontend-layout>
