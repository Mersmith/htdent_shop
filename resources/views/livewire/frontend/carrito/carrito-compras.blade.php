<div>
    @section('tituloPagina', 'Carrito de Compra')
    <div class="contenedor_pagina_carrito">
        <div class="contenedor_centrar_pagina">
            @if (Cart::count())
                <div class="grid_carrito_compras">
                    <!--Carrito-->
                    <div class="grid_elementos_carrito">
                        <!--Carrito-->
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
                        <!--Contacto-->
                        <div class="contenedor_contacto">
                            <h1>Datos de Envio</h1>
                            <hr>
                            <!--Nombre-->
                            <div class="contenedor_elemento_formulario">
                                <label>Nombre de contácto:</label>
                                <input type="text"
                                    placeholder="Ingrese el nombre de la persona que recibirá el producto."
                                    wire:model.defer="contacto">
                                @error('contacto')
                                    <span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--Celular-->
                            <div class="contenedor_elemento_formulario">
                                <label>Teléfono de contácto:</label>
                                <input type="text" placeholder="Ingrese un número de telefono de contácto."
                                    wire:model.defer="celular">
                                @error('contacto')
                                    <span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- tipo_envio: Es una variable de alpine --}}
                            {{-- entangle: Toma la variable del livewire --}}
                            <div x-data="{ tipo_envio: @entangle('tipo_envio') }">

                                <div class="contenedor_elemento_formulario">
                                    <label>¿Dónde quieres recoger tu producto?:</label>
                                    <div class="contenedor_formulario_checkbox">
                                        <label>
                                            <input type="radio" value="1" name="tipo_envio" x-model="tipo_envio">
                                            Recojo en tienda (Calle Pablo Usandizaga 683, San Borja, Lima, Perú)
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" value="2" name="tipo_envio" x-model="tipo_envio">
                                            Envío a domicilio
                                        </label>
                                    </div>
                                    @error('crearFormulario.tiene_color')
                                        <span>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- class: Clase dinamica de alpine --}}
                                <div :class="{ 'hidden': tipo_envio != 2 }">
                                    <!--Departamentos-->
                                    <div class="contenedor_elemento_formulario">
                                        <label>Departamento:</label>
                                        <select wire:model="departamento_id">
                                            <option value="" selected disabled>Seleccione un departamento</option>

                                            @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departamento_id')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--Ciudades-->
                                    <div class="contenedor_elemento_formulario">
                                        <label>Ciudad:</label>
                                        <select wire:model="ciudad_id">
                                            <option value="" selected disabled>Seleccione una ciudad</option>

                                            @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('ciudad_id')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--Distritos-->
                                    <div class="contenedor_elemento_formulario">
                                        <label>Distrito:</label>
                                        <select wire:model="distrito_id">
                                            <option value="" selected disabled>Seleccione un distrito</option>

                                            @foreach ($distritos as $distrito)
                                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('distrito_id')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--Dirección-->
                                    <div class="contenedor_elemento_formulario">
                                        <label>Dirección:</label>
                                        <input type="text" placeholder="Dirección del contácto."
                                            wire:model="direccion">
                                        @error('direccion')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!--Referencia-->
                                    <div class="contenedor_elemento_formulario">
                                        <label>Referencia:</label>
                                        <input type="text" placeholder="Referencia de la dirección."
                                            wire:model="referencia">
                                        @error('direccion')
                                            <span>
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
                                <div>${{ Cart::subTotal() }}</div>
                            </div>
                            <!--ENVIO-->
                            <div class="contenedor_pago">
                                <div>ENVIO: </div>
                                <div>
                                    @if ($tipo_envio == 1 || $costo_envio == 0)
                                        Gratis
                                    @else
                                        ${{ $costo_envio }}
                                    @endif
                                </div>
                            </div>
                            <hr>

                            @php
                                $productosCarrito = json_decode(Cart::content(), true);
                                
                                //$cantidadElementos = array_sum(array_column($productosCarrito, 'id'));
                                
                                $cantidadElementos = count($productosCarrito);
                                
                                $totalPuntosProducto = 0;
                                foreach ($productosCarrito as $producto) {
                                    $opciones = $producto['options'];
                                    $totalPuntosProducto += $opciones['puntos_ganar'] * $producto['qty'];
                                }
                            @endphp

                            <!--CUPON-->
                            @if (!$cupon_descuento > 0)
                                <div class="contenedor_pago">
                                    <div>Cupón: </div>
                                    <div>
                                        <label style="cursor: pointer">
                                            ¿Tienes código de
                                            cupón?
                                            <input type="checkbox" name="tieneCodigoCupon" value="1"
                                                wire:model="tieneCodigoCupon">
                                        </label>
                                    </div>
                                </div>
                                @if ($tieneCodigoCupon == 1)
                                    <div class="contenedor_pago">
                                        <div>Ingresa el código de cupón:
                                            @if (Session::has('cupon_mensaje'))
                                                <div>{{ Session::get('cupon_mensaje') }}</div>
                                            @endif
                                        </div>
                                        <form wire:submit.prevent="aplicarCodigoCupon">
                                            <input type="text" name="codigo_cupon" wire:model="codigo_cupon">
                                            <button type="submit">Aplicar</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                            @if ($cupon_descuento > 0)
                                <div class="contenedor_pago">
                                    <div>Cupón: </div>
                                    <div>
                                        <span wire:click.prevent="eliminarCupon"><i
                                                class="fa-solid fa-xmark"></i></span>
                                        @if ($tipoCupon == 'fijo')
                                            <span>
                                                -${{ $cupon_descuento }}
                                            </span>
                                        @else
                                            <span>
                                                -{{ $cupon_descuento }} %
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <!--PUNTOS-->
                            @if (!$puntos_descuento > 0)
                                <div class="contenedor_pago">
                                    <div>Puntos: <code>Estas ganando {{ $totalPuntosProducto }}</code> </div>
                                    <div>
                                        <label style="cursor: pointer">
                                            ¿Quieres usar CRD Puntos?
                                            <input type="checkbox" name="tienePuntos" value="1"
                                                wire:model="tienePuntos">
                                        </label>
                                    </div>
                                </div>
                                @if ($tienePuntos == 1)
                                    <div class="contenedor_pago">
                                        <div>Ingresa la cantidad de puntos: <code>Tienes
                                                {{ auth()->user()->cliente->puntos }}</code>
                                            @if (Session::has('puntos_mensaje'))
                                                <div>{{ Session::get('puntos_mensaje') }}</div>
                                            @endif
                                        </div>
                                        <form wire:submit.prevent="aplicarPuntos">
                                            <input type="number" name="puntosCanje" wire:model="puntosCanje">
                                            <button type="submit">Aplicar</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                            @if ($puntos_descuento > 0)
                                <div class="contenedor_pago">
                                    <div>Puntos: </div>
                                    <div>
                                        <span wire:click.prevent="eliminarPuntos"><i
                                                class="fa-solid fa-xmark"></i></span>
                                        <span>
                                            -${{ $puntos_descuento }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                            <hr>
                            <!--TOTAL-->
                            <div class="contenedor_pago" style="font-size: 20px">
                                <div>
                                    <span style="font-weight: 600;">TOTAL:</span>
                                </div>
                                <div>
                                    @if ($tipo_envio == 1)
                                        @if ($tipoCupon == 'fijo')
                                            ${{ (float) Cart::subtotal(2, '.', '') - $cupon_descuento - $puntos_descuento }}
                                        @else
                                            ${{ (float) Cart::subtotal(2, '.', '') - $cupon_descuento - $puntos_descuento - ($cupon_descuento * Cart::subtotal()) / 100 }}
                                        @endif
                                    @else
                                        ${{ (float) Cart::subtotal(2, '.', '') + $costo_envio - $cupon_descuento - $puntos_descuento }}
                                    @endif
                                </div>
                            </div>
                            <div class="contenedor_boton_pagar">
                                <button wire:loading.attr="disabled" wire:target="crearOrden" class="mt-6 mb-4"
                                    wire:click="crearOrden">Comprar</button>
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
