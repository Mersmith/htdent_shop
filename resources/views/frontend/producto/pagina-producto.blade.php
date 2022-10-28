<x-frontend-layout>
    @section('tituloPagina', 'Producto | ' . $producto->nombre)
    <div class="contenedor_pagina_producto">
        <div class="contenedor_centrar_pagina">
            <div class="contenedor_info_producto">
                <!--Imagen-->
                <div class="contenedor_producto_imagen">
                    @if ($producto->imagenes->count())

                        <div x-data="{ total: {{ $producto->imagenes->count() }}, current: 0, open: true }">

                            <div x-show="open" class="contenedor_imagen_producto_principal">
                                @foreach ($producto->imagenes as $key => $imagen)
                                    <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt=""
                                        x-show="current == {{ $key }}">
                                @endforeach
                                <span class="agregar_favorito"> <i class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
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
                                            <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt=""
                                                @click="current = {{ $key }}, open = true">
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
                <!--Informacion-->
                <div class="contenedor_producto_info">
                    <h1>{{ $producto->nombre }} </h1>
                    <p class="producto_info_sku">SKU: {{ $producto->sku }} </p>
                    <p class="producto_info_precio">$ {{ $producto->precio }}.00 <span>Incluye IGV</span></p>

                    @if ($producto->puntos_ganar > 0)
                        <p>Gana hasta {{ $producto->puntos_ganar }} CRD Puntos <span><i
                                    class="fa-solid fa-circle-question"
                                    style="color: #b3b3b3; cursor: pointer;"></i></span> </p>
                    @endif

                    <div class="contenedor_producto_envio">
                        <div class="contenedor_producto_envio_item">
                            <div>
                                <span><i class="fa-solid fa-truck" style="color: #009eff; cursor: pointer;"></i></span>
                            </div>
                            <div>
                                <h2>Envio desde $10.00</h2>
                                <p>Según la ciudad puede variar.</p>
                            </div>
                        </div>
                        <br>
                        <div class="contenedor_producto_envio_item">
                            <div><span><i class="fa-solid fa-shop" style="color: #009eff; cursor: pointer;"></i></span>
                            </div>
                            <div>
                                <h2>Recógelo gratis en Tienda.</h2>
                                <p>Tenemos diferentes sedes.</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        @if ($producto->subcategoria->tiene_color && !$producto->subcategoria->tiene_medida)
                            @livewire('frontend.producto-solo.agregar-carrito-variacion-color', ['producto' => $producto])
                        @elseif(!$producto->subcategoria->tiene_color && $producto->subcategoria->tiene_medida)
                            @livewire('frontend.producto-solo.agregar-carrito-variacion-medida', ['producto' => $producto])
                        @elseif($producto->subcategoria->tiene_color && $producto->subcategoria->tiene_medida)
                            @livewire('frontend.producto-solo.agregar-carrito-variacion-medida-color', ['producto' => $producto])
                        @else
                            @livewire('frontend.producto-solo.agregar-carrito-sin-variacion', ['producto' => $producto])
                        @endif
                    </div>

                    <div class="informacion_producto">
                        <p style="margin-bottom: 5px;"><strong>Información del producto:</strong> </p>
                        <p>{!! html_entity_decode($producto->informacion) !!}</p>
                    </div>
                </div>
                <!--Detalle-->
                @if ($producto->tiene_detalle)
                    <div class="contenedor_producto_detalles">
                        <p style="margin-bottom: 5px;"><strong>Características del producto:</strong> </p>

                        <div class="tabla_infoproducto">{!! html_entity_decode($producto->detalle) !!}</div>
                    </div>
                @endif
                <!--Video-->
                @if ($producto->link_video)
                    <div class="contenedor_producto_video">
                        <iframe src="https://www.youtube.com/embed/8UlX4a_zYNk" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div>
        <p>Componente comentarios</p>
    </div>

    {{-- @livewire('frontend.productos.slider-producto', ['productos' => $productos]) --}}

    <div>
        <p>Componente slider pagos</p>
    </div>

    @push('script')
        <script></script>
    @endpush
</x-frontend-layout>
