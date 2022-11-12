<x-administrador-layout>
    @section('tituloPagina', 'Administrador | Roles')
    <!--Titulo-->
    <h2 class="administrador_paginas_titulo">TODOS LOS ROLES</h2>
    <!--Boton crear-->
    <div class="contenedor_boton_crear">
        <a href="{{ route('administrador.rol.crear') }}">Crear Nuevo Rol</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_pagina_administrador_roles">
        <!--Contenedor tabla-->
        @if ($roles->count())
            <div class="py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    N°</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Nombre</th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $rol)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $key }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        {{ $rol->name }}
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm tabla_controles">
                                        <a href="{{ route('administrador.rol.editar', $rol) }}"><span><i
                                                    class="fa-solid fa-pencil" style="color: green;"></i></span>
                                            Editar</a> |
                                        <form action="{{ route('administrador.rol.eliminar', $rol) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a onclick="return funcionEliminar({{ $key }});">
                                                <span><i class="fa-solid fa-trash" style="color: red;"></i></span>
                                                Eliminar</a>
                                            <button type="submit" id="boton-eliminar-{{ $key }}"
                                                style="display: none;">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="conetenedor_no_existe">
                <p>No hay roles</p>
                <i class="fa-solid fa-spinner"></i>
            </div>
        @endif
    </div>
    <script>
        function funcionEliminar(id) {
            event.preventDefault();
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar este rol.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("boton-eliminar-" + id).click();
                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    );
                }
            })
        }
    </script>
</x-administrador-layout>
