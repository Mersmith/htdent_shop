<div class="contenedor_pagina_administrador">
    @section('tituloPagina', 'Productos')

    <div class="titulo_pagina">
        <h2>Cupones</h2>
    </div>
    <div>
        <a href="{{ route('administrador.cupones.crear') }}">Crear cupón</a>
    </div>

    @if (Session::has('message'))
        <div>{{ Session::get('message') }} </div>
    @endif

    @if ($cupones->count())
        <div class="py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Código Cupon</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Tipo</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Descuento</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Monto Carrito</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Expiración</th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200  text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cupones as $cupon)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $cupon->codigo }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $cupon->tipo }}
                                </td>

                                @if ($cupon->tipo == 'fijo')
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        ${{ $cupon->descuento }}.00
                                    </td>
                                @else
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $cupon->descuento }}%
                                    </td>
                                @endif
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $cupon->carrito_monto }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    {{ $cupon->fecha_expiracion }}
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                    <a href="{{ route('administrador.cupones.editar', ['cupon' => $cupon->id]) }}">
                                        <span><i class="fa-solid fa-pencil" style="color: green;"></i></span>
                                        Editar
                                    </a>
                                    |
                                    <a wire:click="$emit('eliminarCuponModal', '{{ $cupon->id }}')">
                                        <span><i class="fa-solid fa-trash" style="color: red;"></i></span>
                                        Eliminar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div>
            <p>No hay cupones</p>
        </div>
    @endif
</div>

@push('script')
    <script>
        Livewire.on('eliminarCuponModal', cuponId => {
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar este cupón.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('administrador.cupon.mostrar-cupones',
                        'eliminarCupon', cuponId);
                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    );
                }
            })
        });
    </script>
@endpush
