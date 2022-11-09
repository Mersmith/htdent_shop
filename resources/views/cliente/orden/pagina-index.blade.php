<x-frontend-layout>
    <?php
    $estado = $_GET['estado'] ?? '';
    $titulo = '';
    if ($estado == 1) {
        $titulo = ' | Falta Pagar';
    } elseif ($estado == 2) {
        $titulo = ' | Alistado';
    } elseif ($estado == 3) {
        $titulo = ' | Enviado';
    } elseif ($estado == 4) {
        $titulo = ' | Entregado';
    } elseif ($estado == 5) {
        $titulo = ' | Anulado';
    }
    ?>
    @section('tituloPagina', 'Mis Ordenes' . $titulo)
    <div class="contenedor_pagina_orden">
        <h1>Mis Ordenes {{ $titulo }} </h1>
        <hr>
        <br>
        <!--Grid estado-->
        <div class="grid_estado_orden">
            <div class="grid_estado_1 estilo_estado_orden" style="background-color: rgb(245, 171, 11);">
                <a href="{{ route('cliente.orden.index') . '?estado=1' }}">
                    <p class="text-center text-2xl">
                        {{ $pendiente }}
                    </p>
                    <p class="uppercase text-center">Falta Pagar</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fas fa-business-time"></i>
                    </p>
                </a>
            </div>
            <div class="grid_estado_2 estilo_estado_orden" style="background-color: rgb(13, 235, 87);">
                <a href="{{ route('cliente.orden.index') . '?estado=2' }}">
                    <p class="text-center text-2xl">
                        {{ $recibido }}
                    </p>
                    <p class="uppercase text-center">Alistado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-list-check"></i>
                    </p>
                </a>
            </div>
            <div class="grid_estado_3 estilo_estado_orden" style="background-color: rgb(13, 191, 235);">
                <a href="{{ route('cliente.orden.index') . '?estado=3' }}">
                    <p class="text-center text-2xl">
                        {{ $enviado }}
                    </p>
                    <p class="uppercase text-center">Enviado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fas fa-truck"></i>
                    </p>
                </a>
            </div>
            <div class="grid_estado_4 estilo_estado_orden" style="background-color: rgb(223, 13, 195);">
                <a href="{{ route('cliente.orden.index') . '?estado=4' }}">
                    <p class="text-center text-2xl">
                        {{ $entregado }}
                    </p>
                    <p class="uppercase text-center">Entregado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fa-solid fa-box-open"></i>
                    </p>
                </a>
            </div>
            <div class="grid_estado_5 estilo_estado_orden" style="background-color: rgb(243, 57, 10);">
                <a href="{{ route('cliente.orden.index') . '?estado=5' }}">
                    <p class="text-center text-2xl">
                        {{ $anulado }}
                    </p>
                    <p class="uppercase text-center">Anulado</p>
                    <p class="text-center text-2xl mt-2">
                        <i class="fas fa-times-circle"></i>
                    </p>
                </a>
            </div>
        </div>
        @if ($ordenes->count())
            <!--Pedidos-->
            <div class="contenedor_lista_ordenes">
                <section>
                    <ul>
                        @foreach ($ordenes as $orden)
                            <li>
                                <a href="{{ $orden->estado == 1 ? route('cliente.orden.pagar', $orden) : route('cliente.orden.mostrar', $orden) }}"
                                    class="flex items-center py-2 px-4 hover:bg-gray-100">
                                    <span class="w-12 text-center">
                                        @switch($orden->estado)
                                            @case(1)
                                                <i class="fas fa-business-time" style="color: rgb(245, 171, 11);"></i>
                                            @break

                                            @case(2)
                                                <i class="fa-solid fa-list-check" style="color: rgb(13, 235, 87);"></i>
                                            @break

                                            @case(3)
                                                <i class="fas fa-truck" style="color: rgb(13, 191, 235);"></i>
                                            @break

                                            @case(4)
                                                <i class="fa-solid fa-box-open" style="color: rgb(223, 13, 195);"></i>
                                            @break

                                            @case(5)
                                                <i class="fas fa-times-circle" style="color: rgb(243, 57, 10);"></i>
                                            @break

                                            @default
                                        @endswitch
                                    </span>

                                    <span>
                                        Orden: N° 00000-{{ $orden->id }}
                                        <br>
                                        {{ $orden->created_at->format('d/m/Y') }}
                                    </span>


                                    <div class="ml-auto">
                                        <span class="font-bold">
                                            @switch($orden->estado)
                                                @case(1)
                                                    Ir a Pagar
                                                @break

                                                @case(2)
                                                    Alistado
                                                @break

                                                @case(3)
                                                    Enviado
                                                @break

                                                @case(4)
                                                    Entregado
                                                @break

                                                @case(5)
                                                    Anulado
                                                @break

                                                @default
                                            @endswitch
                                        </span>

                                        <br>

                                        <span class="text-sm">
                                            {{ number_format($orden->total, 2) }} USD
                                        </span>
                                    </div>

                                    <span>
                                        <i class="fas fa-angle-right ml-6"></i>
                                    </span>

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            </div>
        @else
            <div>
                No tiene ordenes
            </div>
        @endif
    </div>

</x-frontend-layout>
