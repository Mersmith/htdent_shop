<div>
    @section('tituloPagina', 'Pagar Orden')

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
        'failure' => 'http://www.tu-sitio/failure',
        'pending' => 'http://www.tu-sitio/pending',
    ];
    $preference->auto_return = 'approved';
    
    $preference->items = $productos;
    $preference->save();
    ?>

    <div>
        <h1>Pagar</h1>
        <a href="{{ route('cliente.orden.comprar.paypal', $orden) }}">Pagar con Paypal</a>

        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div
                class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div
                class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $orden->id }}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($orden->tipo_envio == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle falsa 123</p>
                    @else
                        <p class="text-sm">Los productos Serán enviados a:</p>
                        <p class="text-sm">{{ $envio->direccion }}</p>
                        <p>{{ $envio->departamento }} - {{ $envio->ciudad }} - {{ $envio->distrito }}
                        </p>
                    @endif


                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                    <p class="text-sm">Persona que recibirá el producto: {{ $orden->contacto }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $orden->celular }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($productosCarrito as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->imagen }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">

                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset

                                            @isset($item->options->medida)
                                                - {{ $item->options->medida }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{ $item->price }} USD
                            </td>

                            <td class="text-center">
                                {{ $item->qty }}
                            </td>

                            <td class="text-center">
                                {{ $item->price * $item->qty }} USD
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div>
            <p> Subtotal:{{ $orden->total - $orden->costo_envio + (float) $orden->cupon_precio + (float) $orden->puntos_canjeados * 1.5 }}
            </p>
            <p> Envio:{{ $orden->costo_envio }} </p>
            {{-- <p> Cupon descuento:{{ $orden->cupon_descuento }} </p> --}}
            <p> Cupon en dolares:{{ $orden->cupon_precio }}
            </p>
            {{-- <p> Puntos Canjeados:{{ $orden->puntos_canjeados }} </p> --}}
            <p> Puntos en Dolares:{{ $orden->puntos_canjeados * 1.5 }} </p>
            <p> Total:{{ $orden->total }} USD </p>
            <div class="cho-container"></div>
            <div id="paypal-button-container"></div>
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
                label: 'Pagar',
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
            }
        }).render('#paypal-button-container');
    </script>


</div>
