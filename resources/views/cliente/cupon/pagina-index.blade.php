<x-cliente-layout>
    @section('tituloPagina', 'Mis Cupones')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">MIS CUPONES</h2>
    <!--Boton crear-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.producto.index') }}">
            Ir a comprar <i class="fa-solid fa-gifts"></i></a>
    </div>
    <br>
    @if ($cupones->count())
        @foreach ($cupones as $cupon)
            <div
                style="display: flex; padding: 10px; border: 1.5px solid #cfd3d9; margin: 10px 0px; border-radius: 5px;">
                <div style="margin-right: 5px;"><i class="fa-solid fa-tags"></i></div>
                <div>
                    <p>Descuento:
                        @if ($cupon->tipo == "fijo")
                            ${{ $cupon->descuento }}
                        @else
                            %{{ $cupon->descuento }}
                        @endif
                    </p>
                    <p style="font-weight: 600">CÓDIGO: {{ $cupon->codigo }}</p>
                    <p>Solo para compras de un monto de: ${{ $cupon->carrito_monto }}</p>
                    <p>Inicio: {{ $cupon->created_at->format('Y-m-d') }} - <span style="font-weight: 600">Fin:
                            {{ $cupon->fecha_expiracion }}</span></p>
                    <p style="font-weight: 500; color: #009eff;">Vence en @php
                        $fechaActual = date('Y-m-d');
                        $datetime1 = date_create($cupon->fecha_expiracion);
                        $datetime2 = date_create($fechaActual);
                        $contador = date_diff($datetime1, $datetime2);
                        $differenceFormat = '%a';
                        echo $contador->format($differenceFormat);
                    @endphp días</p>
                </div>
            </div>
        @endforeach
    @else
        <div class="contenedor_no_existe_elementos">
            <p>No tienes cupónes</p>
            <i class="fa-solid fa-spinner"></i>
        </div>
    @endif
</x-cliente-layout>