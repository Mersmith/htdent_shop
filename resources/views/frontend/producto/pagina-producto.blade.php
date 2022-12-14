<x-frontend-layout>
    @section('tituloPagina', 'Producto | ' . $producto->nombre)
    <div class="contenedor_pagina_producto">
        <div class="contenedor_centrar_pagina">
            <div class="contenedor_info_producto">
                <!--Imagen-->
                <div class="contenedor_producto_imagen">
                    @php
                        $imagesOrdenadas = [];
                        $imagenesGaleria = $producto->imagenes->sortBy('posicion');
                        foreach ($imagenesGaleria as $item) {
                            $imagesOrdenadas[] = $item;
                        }
                        $cantidadImagenes = count($imagesOrdenadas); //4
                        //0, 1, 2, 3
                    @endphp

                    @if ($producto->imagenes->count())

                        <div x-data="{ total: {{ $producto->imagenes->count() }}, current: 0, open: true }">
                            <div x-show="open" class="contenedor_imagen_producto_principal">
                                @foreach ($imagesOrdenadas as $key2 => $imagen)
                                    <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt=""
                                        x-show="current == {{ $key2 }}">
                                @endforeach

                                @livewire('frontend.producto-solo.agregar-favorito-producto', ['producto' => $producto])

                                <div @click="
                                if(current > 0){ 
                                    current = current - 1;
                                }else{ 
                                    current = {{$cantidadImagenes - 1}};
                                }
                                "
                                    class="contenedor_imagen_pie_controles contenedor_imagen_pie_izquierdo">
                                    <span><i class="fa-solid fa-angle-left"></i></span>
                                </div>
                                <div @click="
                                if(current < total-1){ 
                                    current = current + 1;
                                }else{ 
                                    current = 0;
                                }
                                "
                                    class="contenedor_imagen_pie_controles contenedor_imagen_pie_derecho">
                                    <span><i class="fa-solid fa-angle-right"></i></span>
                                </div>
                            </div>

                            <div class="contenedor_imagen_producto_pie">
                                <div class="contenedor_imagen_producto_item">
                                    @foreach ($imagesOrdenadas as $key => $imagen)
                                        <img @click="current = {{ $key }}"
                                            src="{{ Storage::url($imagen->imagen_ruta) }}" alt="">
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="contenedor_imagen_producto_principal">
                            <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                            <span class="agregar_favorito"> <i class="fa-solid fa-heart"
                                    style="color: #ffa03d; cursor: pointer;"></i>
                            </span>
                        </div>
                    @endif
                </div>
                <!--Informacion-->
                <div class="contenedor_producto_info">
                    <img src="{{ Storage::url($producto->marca->imagenes->first()->imagen_ruta) }}" style="width: 80px;"
                        alt="">
                    <h1>{{ $producto->nombre }} </h1>
                    <p class="producto_info_sku">SKU: {{ $producto->sku }} </p>

                    <p class="producto_info_precio">$ {{ number_format($producto->precio, 2, '.', ',') }}
                        @if ($producto->precio !== $producto->precio_real)
                            <span>Antes<span style="text-decoration:line-through;">
                                    ${{ number_format($producto->precio_real, 2, '.', ',') }}</span></span>
                        @endif
                    </p>

                    @if ($producto->incluye_igv > 0)
                        <p><strong>Incluye IGV </strong></p>
                    @endif


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
                                <p>Seg??n la ciudad puede variar.</p>
                            </div>
                        </div>
                        <br>
                        <div class="contenedor_producto_envio_item">
                            <div><span><i class="fa-solid fa-shop" style="color: #009eff; cursor: pointer;"></i></span>
                            </div>
                            <div>
                                <h2>Rec??gelo gratis en Tienda.</h2>
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
                        <p style="margin-bottom: 5px;"><strong>Informaci??n del producto:</strong> </p>
                        <p>{!! html_entity_decode($producto->informacion) !!}</p>
                    </div>
                </div>
                <!--Detalle-->
                @if ($producto->tiene_detalle)
                    <div class="contenedor_producto_detalles">
                        <p style="margin-bottom: 5px;"><strong>Caracter??sticas del producto:</strong> </p>

                        <div class="tabla_infoproducto">{!! html_entity_decode($producto->detalle) !!}</div>
                    </div>
                @endif
                <!--Video-->
                @if ($producto->link_video)
                    <div class="contenedor_producto_video">
                        <iframe src="{{ $producto->link_video }}" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                @endif
                <!--Comentarios-->
                <div x-data="{ seleccionado: null }" class="contenedor_comentarios">
                    <!--Dejar comentario-->
                    @include('frontend.producto.formularioResena')
                    @if ($producto->resenas->isNotEmpty())
                        <h2>Todas las Rese??as</h2>
                        @foreach ($producto->resenas as $key => $resena)
                            <div>
                                <div class="contenedor_resena_comentada">
                                    <div class="resena_comentada_datos">
                                        @if ($resena->user->cliente->imagen_ruta)
                                            <img class="h-12 w-12 rounded-full object-cover" style="margin-right: 12px"
                                                src="{{ Storage::url($resena->user->cliente->imagen_ruta) }}"
                                                alt="{{ $resena->user->cliente->nombre }}" />
                                        @else
                                            <img class="h-12 w-12 rounded-full object-cover" style="margin-right: 12px"
                                                src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}" />
                                        @endif
                                        <div>
                                            <p><strong>{{ $resena->user->cliente->nombre }}</strong></p>
                                            @for ($i = 0; $i < $resena->puntaje; $i++)
                                                <i class="fas fa-star text-yellow-500"></i>
                                            @endfor
                                            <p>{{ $resena->created_at->diffForHumans() }}</p>
                                            <span
                                                @click="seleccionado !== {{ $key }} ? seleccionado = {{ $key }} : seleccionado = null"
                                                style="cursor: pointer; color: red;">Responder</span>
                                        </div>
                                    </div>
                                    <br>
                                    <p>
                                        {!! $resena->comentario !!}
                                    </p>
                                </div>
                                @if (Auth::user())
                                    <div x-show="seleccionado == {{ $key }}"
                                        class="contenedor_resena_respondida" style="margin-left: 25px;">
                                        <div style="display: flex; justify-content: flex-end;">
                                            <span
                                                @click="seleccionado !== {{ $key }} ? seleccionado = {{ $key }} : seleccionado = null"
                                                style="cursor: pointer; color: red; font-size: 20px;"><i
                                                    style="color: red;" class="fa-solid fa-xmark"></i></span>
                                        </div>
                                        @include('frontend.producto.formularioResenaResponder', [
                                            'padre_id' => $resena->id,
                                            'producto_id' => $producto->id,
                                        ])
                                    </div>
                                @endif

                                @if (count($resena->respuestas) > 0)
                                    <div style="margin-left: 25px;">
                                        <div x-data="{ seleccionadoRespuesta: null }" class="contenedor_comentarios">
                                            @foreach ($resena->respuestas as $key2 => $respuesta)
                                                <div>
                                                    <div class="contenedor_resena_respondida">
                                                        <div class="resena_comentada_datos">
                                                            @if ($respuesta->user->cliente->imagen_ruta)
                                                                <img class="h-12 w-12 rounded-full object-cover"
                                                                    style="margin-right: 12px"
                                                                    src="{{ Storage::url($respuesta->user->cliente->imagen_ruta) }}"
                                                                    alt="{{ $respuesta->user->cliente->nombre }}" />
                                                            @else
                                                                <img class="h-12 w-12 rounded-full object-cover"
                                                                    style="margin-right: 12px"
                                                                    src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}" />
                                                            @endif
                                                            <div>
                                                                <p><strong>{{ $respuesta->user->cliente->nombre }}</strong>
                                                                </p>
                                                                @for ($i2 = 0; $i2 < $respuesta->puntaje; $i2++)
                                                                    <i class="fas fa-star text-yellow-500"></i>
                                                                @endfor
                                                                <p>{{ $respuesta->created_at->diffForHumans() }}</p>
                                                                {{-- <span
                                                                    @click="seleccionadoRespuesta !== {{ $key2 }} ? seleccionadoRespuesta = {{ $key2 }} : seleccionadoRespuesta = null"
                                                                    style="cursor: pointer; color: red;">Responder</span>
                                                                <div
                                                                    x-show="seleccionadoRespuesta == {{ $key2 }}">
                                                                    <h2>Responder</h2>
                                                                    @include('frontend.producto.formularioResenaResponder',
                                                                        [
                                                                            'padre_id' => $respuesta->id,
                                                                            'producto_id' => $producto->id,
                                                                        ])
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <p>
                                                            {!! $respuesta->comentario !!}
                                                        </p>

                                                        {{-- @if (count($respuesta->respuestas) > 0)
                                                    <hr>
                                                    <div style="margin-left: 50px;">
                                                        <h4>Respuestas 2</h4>
                                                        @foreach ($respuesta->respuestas as $respuesta2)
                                                            <strong>{{ $respuesta2->user->name }}</strong>
                                                            <p>{{ $respuesta2->comentario }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- @livewire('frontend.productos.slider-producto', ['productos' => $productos]) --}}
    <!--
        <div>
            <p>Componente slider pagos</p>
        </div>
-->

@push('script')
<script></script>
@endpush
</x-frontend-layout>
