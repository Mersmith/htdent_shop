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
    @include('layouts.administrador.componentes.css')
</head>

<body class="font-sans antialiased">
    {{-- Sirve para crear los flash.banner --}}
    <x-jet-banner />

    <div class="min-h-screen">
        {{-- @livewire('navigation-menu') --}}

        @livewire('administrador.menu.menu-principal')

        <!-- Contenido de páginas-->
        <main class="contenedor_layout_administrador">
            {{ $slot }}
        </main>
    </div>

    @include('layouts.administrador.componentes.js')
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
    </script>
</body>

</html>
