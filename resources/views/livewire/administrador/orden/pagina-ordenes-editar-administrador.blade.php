<div>
    @section('tituloPagina', 'Orden | N° 00000-' . $orden->id)
    @php
        $envio = json_decode($orden->envio);
        $productosCarrito = json_decode($orden->contenido);
    @endphp

    <div>
        <!--Estado producto-->
        {{-- <div class="formulario">
            <!--Estado-->
            <div class="contenedor_1_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Estado de la Orden: </p>
                    <div>
                        <label>
                            <input type="radio" value="1" name="estado" wire:model.defer="estado">
                            Falta Pagar
                        </label>
                        <label>
                            <input type="radio" value="2" name="estado" wire:model.defer="estado">
                            Orden
                        </label>
                        <label>
                            <input type="radio" value="3" name="estado" wire:model.defer="estado">
                            Enviado
                        </label>
                        <label>
                            <input type="radio" value="4" name="estado" wire:model.defer="estado">
                            Entregado
                        </label>
                        <label>
                            <input type="radio" value="5" name="estado" wire:model.defer="estado">
                            Cancelado
                        </label>
                    </div>
                    @error('estado')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Enviar-->
            <div class="contenedor_1_elementos">
                <button wire:click="actualizarEstadoOrden" wire:loading.attr="disabled"
                    wire:target="actualizarEstadoOrden">
                    Actualizar estado
                </button>
            </div>
        </div> --}}

        <div class="contenedor_estado_producto formulario">
            <div style="text-align: center">
                <h1 style="margin-bottom: 5px;">Orden: N° 00000-{{ $orden->id }} </h1>
            </div>
            <br>
            <div class="flex items-center">
                <!--Recibido-->
                <div class="relative">
                    <div class="rounded-full h-11 w-11 flex items-center justify-center"
                        style="background-color: {{ !$orden->estado == 1 || ($orden->estado >= 2 && $orden->estado != 5) ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">

                        <label style="cursor: pointer;">
                            <input style="display: none;" type="radio" value="1" name="estado"
                                wire:model="estado">
                            <i class="fa-solid fa-dollar-sign text-white"></i>
                        </label>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Pagado</p>
                    </div>
                </div>
                <div class="h-1 flex-1 mx-2"
                    style="background-color: {{ $orden->estado >= 2 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                </div>
                <!--Ordenado-->
                <div class="relative">
                    <div class="rounded-full h-11 w-11 flex items-center justify-center"
                        style="background-color: {{ $orden->estado >= 2 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                        <label style="cursor: pointer;">
                            <input style="display: none;" type="radio" value="2" name="estado"
                                wire:model="estado">
                            <i class="fa-solid fa-list-check  text-white"></i>
                        </label>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Alistado</p>
                    </div>
                </div>
                <div class="h-1 flex-1 mx-2"
                    style="background-color: {{ $orden->estado >= 3 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                </div>
                <!--Enviado-->
                <div class="relative">
                    <div class="rounded-full h-11 w-11 flex items-center justify-center"
                        style="background-color: {{ $orden->estado >= 3 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                        <label style="cursor: pointer;">
                            <input style="display: none;" type="radio" value="3" name="estado"
                                wire:model="estado">
                            <i class="fas fa-truck text-white"></i>
                        </label>
                    </div>
                    <div class="absolute -left-1 mt-0.5">
                        <p>Enviado</p>
                    </div>
                </div>
                <div class="h-1 flex-1 mx-2"
                    style="background-color: {{ $orden->estado >= 4 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                </div>
                <!--Entregado-->
                <div class="relative">
                    <div class="rounded-full h-11 w-11 flex items-center justify-center"
                        style="background-color: {{ $orden->estado >= 4 && $orden->estado != 5 ? 'rgb(245, 171, 11)' : '#9CA3AF' }}">
                        <label style="cursor: pointer;">
                            <input style="display: none;" type="radio" value="4" name="estado"
                                wire:model="estado">
                            <i class="fa-solid fa-box-open text-white"></i>
                        </label>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p>Entregado</p>
                    </div>
                </div>
                <div class="h-1 flex-1 mx-2" style="background-color: #9CA3AF">
                </div>
                <!--Entregado-->
                <div class="relative">
                    <div class="rounded-full h-11 w-11 flex items-center justify-center"
                        style="background-color: {{ $orden->estado >= 5 && $orden->estado != 6 ? 'red' : '#9CA3AF' }}">
                        <label style="cursor: pointer;">
                            <input style="display: none;" type="radio" value="5" name="estado"
                                wire:model="estado">
                            <i class="fa-solid fa-ban  text-white"></i>
                        </label>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p>Cancelado</p>
                    </div>
                </div>
            </div>
            <br>
            <div>
                <button wire:click="actualizarEstadoOrden" wire:loading.attr="disabled"
                    wire:target="actualizarEstadoOrden">
                    Actualizar estado a:
                    @if ($estado == 1)
                        Falta pagar
                    @elseif($estado == 2)
                        Alistado
                    @elseif($estado == 3)
                        Enviado
                    @elseif($estado == 4)
                        Entregado
                    @elseif($estado == 5)
                        Cancelado
                    @endif
                </button>
            </div>
        </div>
        <!--Resumen producto-->
        <div class="contenedor_centrar_pagina">
            <!--Carrito-->
            <div class="grid_carrito_compras">
                <!--Carrito-->
                <div class="grid_elementos_carrito">
                    <!--Carrito-->
                    <div class="contenedor_carrito">
                        <h1>Resumen de Compra</h1>
                        <hr>
                        <table>
                            <thead>
                                <tr>
                                    <th>

                                    </th>
                                    <th style="text-align: left">
                                        Producto
                                    </th>
                                    <th>
                                        Precio
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productosCarrito as $item)
                                    <tr>
                                        <td class="imagen_producto_datos_tabla">
                                            <img src="{{ $item->options->imagen }}" alt="">
                                        </td>
                                        <td class="datos_producto_datos_tabla" style="vertical-align: top;">
                                            <div>
                                                <p class="titulo_tabla_producto">{{ $item->name }}</p>
                                                <div>
                                                    @if ($item->options->color_id)
                                                        @if ($item->options->color !== 'ninguno')
                                                            <p><span>Color: </span>{{ $item->options->color }}</p>
                                                        @endif
                                                    @endif
                                                    @if ($item->options->medida_id)
                                                        <p><span>Medida: </span>{{ $item->options->medida }}</p>
                                                    @endif

                                                    <p><span>Puntos:
                                                        </span>{{ $item->options->puntos_ganar * $item->qty }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div>
                                                <span>USD {{ number_format($item->price, 2) }}</span>
                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div>
                                                {{ $item->qty }}

                                            </div>
                                        </td>
                                        <td style="text-align: center;">
                                            <div>
                                                USD {{ number_format($item->price * $item->qty, 2) }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--Contacto-->
                    <div class="contenedor_contacto">
                        <h1>Resumen de Envio</h1>
                        <hr>
                        <!--Nombre-->
                        <div class="contenedor_elemento_formulario">
                            <label>Nombre de contácto:</label>
                            <p>{{ $orden->contacto }}</p>
                        </div>
                        <!--Celular-->
                        <div class="contenedor_elemento_formulario">
                            <label>Teléfono de contácto:</label>
                            <p>{{ $orden->celular }}</p>
                        </div>
                        {{-- tipo_envio: Es una variable de alpine --}}
                        {{-- entangle: Toma la variable del livewire --}}
                        <label>Recogerá su producto en:</label>
                        <div class="contenedor_elemento_formulario">
                            @if ($orden->tipo_envio == 1)
                                <label>Departamento:</label>
                                <p>Recojo en tienda (Calle Pablo Usandizaga 683, San Borja, Lima, Perú)</p>
                            @else
                                <label>Departamento:</label>
                                <p>{{ $envio->departamento }}</p>
                                <label>Provincia:</label>
                                <p>{{ $envio->provincia }}</p>
                                <label>Distrito:</label>
                                <p>{{ $envio->distrito }}</p>
                                <label>Dirección:</label>
                                <p>{{ $envio->direccion }}</p>
                                <label>Referencia:</label>
                                <p>{{ $envio->referencia }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!--Pago-->
                <div class="grid_metodo_pago">
                    <div class="contenedor_pago_resumen">
                        <h1>Resumen de pago</h1>
                        <hr>
                        <!--SUBTOTAL-->
                        <div class="contenedor_pago">
                            <div>SUBTOTAL: </div>
                            <div>
                                ${{ number_format($orden->total - $orden->costo_envio + (float) $orden->cupon_precio + (float) $orden->puntos_canjeados * 1.5, 2) }}
                            </div>
                        </div>
                        <!--ENVIO-->
                        <div class="contenedor_pago">
                            <div>ENVIO: </div>
                            <div>
                                @if ($orden->tipo_envio == 1)
                                    Gratis
                                @else
                                    ${{ number_format($orden->costo_envio, 2) }}
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!--CUPON-->
                        @if ($orden->cupon_descuento)
                            <div class="contenedor_pago">
                                <div>Cupón: </div>
                                <div>
                                    <span>
                                        -${{ number_format($orden->cupon_precio, 2) }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                        @endif
                        <!--PUNTOS-->
                        @if ($orden->puntos_canjeados)
                            <div class="contenedor_pago">
                                <div>Puntos: </div>
                                <div>
                                    <span>
                                        -${{ number_format($orden->puntos_canjeados * 1.5, 2) }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                        @endif
                        <!--TOTAL-->
                        <div class="contenedor_pago" style="font-size: 20px">
                            <div>
                                <span style="font-weight: 600;">TOTAL:</span>
                            </div>
                            <div>
                                ${{ number_format($orden->total, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
