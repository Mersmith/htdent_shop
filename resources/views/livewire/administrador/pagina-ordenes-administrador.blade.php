<div class="contenedor_pagina_administrador">
    @section('tituloPagina', 'Ordenes')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">TODOS LAS ORDENES</h2>
    <!--Grid estado-->
    <div class="grid_estado_orden">
        <div class="grid_estado_1 estilo_estado_orden" style="background-color: rgb(245, 171, 11);">
            <a href="{{ route('administrador.ordenes.index') . '?estado=1' }}">
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
            <a href="{{ route('administrador.ordenes.index') . '?estado=2' }}">
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
            <a href="{{ route('administrador.ordenes.index') . '?estado=3' }}">
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
            <a href="{{ route('administrador.ordenes.index') . '?estado=4' }}">
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
            <a href="{{ route('administrador.ordenes.index') . '?estado=5' }}">
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
    <!--Buscador-->
    <div class="contenedor_buscador">
        <input type="text" wire:model="buscarOrden" placeholder="Ingrese el nombre del producto que quiere buscar.">
    </div>
    <!--Contenedor tabla-->
    @if ($ordenes->count())
        <div class="py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <!--<th
                                class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Imagen</th>-->
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Nombre</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Ruta</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Categoría</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Estado</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Precio</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordenes as $ordenItem)
                            <tr>
                                {{-- <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        @if ($producto->imagenes->count())
                                            <img class="w-full h-full"
                                                src="{{ Storage::url($producto->imagenes->first()->imagen_ruta) }}"
                                                alt="" />
                                        @else
                                            <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                                        @endif
                                    </div>
                                </td> --}}
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    N° 00000-{{ $ordenItem->id }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $ordenItem->contacto }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $ordenItem->celular }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @switch($ordenItem->estado)
                                        @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Borrador
                                            </span>
                                        @break

                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado
                                            </span>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $ordenItem->total }} USD
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm cursor-pointer">
                                    <a href="{{ route('administrador.producto.editar', $ordenItem) }}">
                                        <span><i class="fa-solid fa-pencil" style="color: green;"></i></span>
                                        Ver</a> |
                                    <a wire:click="$emit('eliminarProductoModal', '{{ $ordenItem->id }}')">
                                        <span><i class="fa-solid fa-trash" style="color: red;"></i></span>
                                        Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="contenedor_no_existe_elementos">
            <p>No hay ordenes</p>
            <i class="fa-solid fa-spinner"></i>
        </div>
    @endif
    @if ($ordenes->hasPages())
        <div class="px-6 py-4">
            {{ $ordenes->links() }}
        </div>
    @endif
</div>
