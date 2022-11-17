<div>
    @section('tituloPagina', 'Mis Direcciones')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">MIS DIRECCIONES</h2>
    <!--Boton crear-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('cliente.direcciones.crear') }}">Crear nueva dirección</a>
    </div>
    @if ($direcciones->count())
        @foreach ($direcciones as $direccionItem)
            <p>{{ $direccionItem->nombres }}</p>
            <p>{{ $direccionItem->celular }}</p>
            <p>{{ $direccionItem->direccion }}</p>
            <p>{{ $direccionItem->referencia }}</p>
            <p>{{ $direccionItem->departamento_nombre }}</p>
            <p>{{ $direccionItem->provincia_nombre }}</p>
            <p>{{ $direccionItem->distrito_nombre }}</p>
            <p>{{ $direccionItem->codigo_postal }}</p>
            <hr>
            <br>
        @endforeach
    @else
        <div class="contenedor_no_existe_elementos">
            <p>No tienes direcciones</p>
            <i class="fa-solid fa-spinner"></i>
        </div>
    @endif
</div>
