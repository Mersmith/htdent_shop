<div>
    @section('tituloPagina', 'Pagar Mi Orden | N° 00000-' . $orden->id)

    <?php
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    $shipments = new MercadoPago\Shipments();
    $payer = new MercadoPago\Payer();
    
    //Datos del Comprados
    $payer->name = $orden->contacto;
    $payer->surname = auth()->user()->cliente->apellido;
    $payer->email = auth()->user()->cliente->correo;
    $payer->date_created = auth()->user()->cliente->created_at;
    $payer->phone = [
        'area_code' => '',
        'number' => $orden->celular,
    ];
    
    $shipments->cost = $orden->costo_envio;
    $shipments->mode = 'not_specified';
    $preference->shipments = $shipments;
    
    // Crea un ítem en la preferencia
    foreach ($productosCarrito as $producto) {
        $item = new MercadoPago\Item();
        $item->id = $producto->id;
        $item->title = $producto->name;
        $item->quantity = $producto->qty;
        $item->unit_price = $producto->price;
        $item->currency_id = 'PEN';
        //$item->currency_id = 'USD';
        $productos[] = $item;
    }
    
    $preference->back_urls = [
        'success' => route('cliente.orden.comprar.mercadopago', $orden),
        'failure' => route('cliente.orden.pagar', $orden),
        'pending' => route('cliente.orden.pagar', $orden),
    ];
    $preference->auto_return = 'approved';
    
    $preference->items = $productos;
    $preference->save();
    ?>

    <div class="contenedor_pagina_carrito">
        <!--Estado producto-->
        <div class="contenedor_estado_producto">
            <div style="text-align: center">
                <h1 style="margin-bottom: 5px;">Orden: N° 00000-{{ $orden->id }} </h1>
                {{-- @if ($orden->estado == 1)
                    <a class="boton_ir_pagar" href="{{ route('cliente.orden.pagar', $orden) }}">
                        Ir a pagar
                    </a>
                @endif --}}
            </div>
            <br>
            <div class="flex items-center">
                <!--Recibido-->
                <div class="relative">
                    <div
                        class="{{ !$orden->estado == 1 || $orden->estado >= 2 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-11 w-11 flex items-center justify-center">
                        <i class="fa-solid fa-dollar-sign text-white"></i>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Pagado</p>
                    </div>
                </div>
                <div
                    class="{{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                </div>
                <!--Ordenado-->
                <div class="relative">
                    <div
                        class="{{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-11 w-11 flex items-center justify-center">
                        <i class="fa-solid fa-list-check  text-white"></i>
                    </div>
                    <div class="absolute -left-1.5 mt-0.5">
                        <p>Alistado</p>
                    </div>
                </div>
                <div
                    class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                </div>
                <!--Enviado-->
                <div class="relative">
                    <div
                        class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-11 w-11 flex items-center justify-center">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <div class="absolute -left-1 mt-0.5">
                        <p>Enviado</p>
                    </div>
                </div>
                <div
                    class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
                </div>
                <!--Entregado-->
                <div class="relative">
                    <div
                        class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-11 w-11 flex items-center justify-center">
                        <i class="fa-solid fa-box-open text-white"></i>
                    </div>
                    <div class="absolute -left-2 mt-0.5">
                        <p>Entregado</p>
                    </div>
                </div>
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
                                {{ number_format($orden->total, 2) }}
                            </div>
                        </div>
                        <div class="contenedor_boton_pagar">
                            <!--<button class="mt-6 mb-4">Comprar</button>-->
                            <label>
                                <div class="boton_mercadopago">
                                    <img width="40px" src="{{ asset('imagenes/pago/mercadopago.png') }}"
                                        alt="">
                                    Pagar con Mercado Pago
                                </div>
                                <div class="cho-container" style="display: none"> </div>
                            </label>
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-PE'
        });

        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container',
                //label: '',
            }
        });
    </script>
    {{-- SDK Paypal --}}
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.cliente') }}"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{ $orden->total }}"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    // This function shows a transaction success message to your buyer.
                    //alert('Transaction completed by ' + details.payer.name.given_name);

                    window.location.href = '{{ route('cliente.orden.comprar.paypal', $orden) }}';
                });
            },
            onCancel: function(data) {
                window.location.href = '{{ route('cliente.orden.pagar', $orden) }}';
            },
            onError: function(err) {
                window.location.href = '{{ route('cliente.orden.pagar', $orden) }}';
            }
        }).render('#paypal-button-container');
    </script>
</div>
