<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('tituloPagina')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @include('layouts.cliente.componentes.css')
</head>

<body class="font-sans antialiased">
    {{-- Sirve para crear los flash.banner --}}
    <x-jet-banner />

    <div class="min-h-screen">
        {{-- @livewire('navigation-menu') --}}

        @livewire('frontend.menu.menu-principal')

        <!-- Contenido de páginas-->
        <main class="contenedor_layout_cliente">
            <div class="contenedor_centrar_pagina">
                <div class="grid_layout_cliente">
                    <div class="contenedor_cliente_menu">
                        <a><i class="fas fa-truck"></i><span>Pedidos</span></a>
                        <a><i class="fa-solid fa-arrows-to-circle"></i><span>CDR Puntos</span></a>
                        <a><i class="fa-solid fa-comments"></i><span>Reseñas</span></a>
                        <a><i class="fa-solid fa-clipboard-check"></i><span>Cupones</span></a>
                        <hr>
                        <a href="{{ route('cliente.perfil') }}"><i class="fa-solid fa-user-pen"></i><span>Datos
                                personales</span></a>
                        <a href="{{ route('cliente.direcciones') }}"><i class="fa-solid fa-map-location-dot"></i><span>Direcciones</span></a>
                        <a><i class="fa-regular fa-credit-card"></i><span>Métodos de pago</span></a>
                        <a><i class="fa-solid fa-file-invoice-dollar"></i><span>Direcciones de factura</span></a>
                        <hr>
                        <a><i class="fa-solid fa-bell"></i><span>Suscripciones</span></a>
                        <hr>
                        <a><i class="fa-solid fa-heart-circle-plus"></i><span>CDR Plus</span></a>
                        <hr>
                        <a><i class="fa-solid fa-right-from-bracket"></i><span>Cerrar sesión</span></a>
                        <hr>
                    </div>
                    <div class="contenedor_cliente_paginas">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.frontend.componentes.pie-pagina')

    </div>

    @include('layouts.cliente.componentes.js')
    @stack('modals')
    @livewireScripts
    @stack('script')
    <script>
        Livewire.on('mensajeCreado', mensaje => {
            Swal.fire({
                icon: 'success',
                title: mensaje,
                showConfirmButton: false,
                timer: 2500
            })
        })

        Livewire.on('mensajeActualizado', mensaje => {
            Swal.fire({
                icon: 'success',
                title: mensaje,
                showConfirmButton: false,
                timer: 2500
            })
        })

        Livewire.on('mensajeEliminado', mensaje => {
            Swal.fire({
                icon: 'error',
                title: mensaje,
                showConfirmButton: false,
                timer: 2500
            })
        })

        Livewire.on('mensajeError', mensaje => {
            Swal.fire({
                icon: 'error',
                title: '¡Alto!',
                text: mensaje,
                showConfirmButton: false,
                timer: 2500
            })
        })
    </script>
</body>

</html>
