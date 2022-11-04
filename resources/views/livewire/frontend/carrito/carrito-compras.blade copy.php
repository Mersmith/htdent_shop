<div>
    @section('tituloPagina', 'Carrito de Compra')
    <div class="contenedor_pagina_carrito">
        <div class="contenedor_centrar_pagina">
            @if (Cart::count())

                <div class="grid_carrito_compras">
                    <div class="grid_elementos_carrito">
                        <div class="contenedor_carrito">
                            <h1>Carrito de Compras</h1>
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
                                    @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="imagen_producto_datos_tabla">
                                                <img src="{{ $item->options->imagen }}" alt="">
                                            </td>
                                            <td class="datos_producto_datos_tabla" style="vertical-align: top;">
                                                <div>
                                                    <p class="titulo_tabla_producto">{{ $item->name }}</p>
                                                    <div>
                                                        @if ($item->options->color)
                                                            @if ($item->options->color !== 'ninguno')
                                                                <p><span>Color: </span>{{ $item->options->color }}</p>
                                                            @endif
                                                        @endif
                                                        @if ($item->options->medida)
                                                            <p><span>Medida: </span>{{ $item->options->medida }}</p>
                                                        @endif

                                                        <p><span>Puntos:
                                                            </span>{{ $item->options->puntos_ganar * $item->qty }}</p>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a wire:click="eliminarProducto('{{ $item->rowId }}')"
                                                        wire:loading.class="text-red-600 opacity-25"
                                                        wire:target="eliminarProducto('{{ $item->rowId }}')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>

                                            <td style="text-align: center;">
                                                <div>
                                                    <span>USD {{ $item->price }}</span>
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <div>
                                                    @if ($item->options->medida)
                                                        @livewire('frontend.carrito.actualizar-cantidad-variacion-medida', ['rowId' => $item->rowId, 'cantidadProducto' => $item->options->cantidad], key($item->rowId))
                                                    @elseif($item->options->color)
                                                        @livewire('frontend.carrito.actualizar-cantidad-variacion-color', ['rowId' => $item->rowId, 'cantidadProducto' => $item->options->cantidad], key($item->rowId))
                                                    @else
                                                        @livewire('frontend.carrito.actualizar-cantidad-sin-variacion', ['rowId' => $item->rowId, 'cantidadProducto' => $item->options->cantidad], key($item->rowId))
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="text-align: center;">
                                                <div>
                                                    USD {{ $item->price * $item->qty }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <button wire:click="eliminarCarritoCompras">
                                    <i class="fas fa-trash"></i>
                                    Borrar carrito de compras
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="grid_metodo_pago">
                        <div class="contenedor_pago_resumen">
                            <h1>Resumen de pago</h1>
                            <hr>
                            <!--SUBTOTAL-->
                            <div class="contenedor_pago">
                                <div>SUBTOTAL: </div>
                                <div>${{ Cart::subTotal() }}</div>
                            </div>
                            <!--ENVIO-->
                            <div class="contenedor_pago">
                                <div>ENVIO: </div>
                                <div>Gratis</div>
                            </div>
                            <hr>
                            <!--CUPON-->
                            <div class="contenedor_pago">
                                <div>Cupón: </div>
                                <div>
                                    <label style="cursor: pointer">
                                        ¿Tienes código de
                                        cupón?
                                        <input type="checkbox" name="tienes_cupon" value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="contenedor_pago">
                                <div>Ingresa el código de cupón: </div>
                                <form>
                                    <input type="text" name="codigo_cupon">
                                    <button type="submit">Aplicar</button>
                                </form>
                            </div>
                            <hr>
                            <!--PUNTOS-->
                            <div class="contenedor_pago">
                                <div>Puntos: </div>
                                <div>
                                    <label style="cursor: pointer">
                                        ¿Tienes CRD Puntos?
                                        <input type="checkbox" name="tienes_puntos" value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="contenedor_pago">
                                <div>Ingresa la cantidad de puntos: </div>
                                <form>
                                    <input type="number" name="puntos_canje">
                                    <button type="submit">Aplicar</button>
                                </form>
                            </div>
                            <hr>
                            <!--TOTAL-->
                            <div class="contenedor_pago" style="font-size: 20px">
                                <div>
                                    <span style="font-weight: 600;">TOTAL:</span>
                                </div>
                                <div>${{ Cart::subTotal() }}</div>
                            </div>
                            <div class="contenedor_boton_pagar">
                                <button>Comprar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p>Tu carrito de compras esta vacio.</p>
                <a href="/"> Ir a inicio</a>
            @endif
        </div>
    </div>
</div>
