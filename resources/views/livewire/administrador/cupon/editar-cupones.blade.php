<div class="contenedor_pagina_administrador">
    <!--Cotenedor formulario-->
    <div class="titulo_pagina">
        <h2>Editar Cupón</h2>
    </div>
    <div>
        <a href="{{ route('administrador.cupones.index') }}">Todos los cupones</a>
    </div>
    <div class="contenedor_formulario">
        <form wire:submit.prevent="actualizarCupon">
            <!--Codigo-->
            <div class="contenedor_elemento_formulario">
                <label>Código Cupón:</label>
                <input type="text" placeholder="Código de Cupón" wire:model="codigo">
                @error('codigo')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Tipo-->
            <div class="contenedor_elemento_formulario">
                <label>Tipo Cupón:</label>
                <select wire:model="tipo">
                    <option value="fijo" selected>Fijo</option>
                    <option value="porcentaje">Porcentaje</option>
                </select>
                @error('tipo')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Descuento-->
            <div class="contenedor_elemento_formulario">
                <label>Descuento
                    @if ($tipo == 'fijo')
                        en $:
                    @elseif($tipo == 'porcentaje')
                        en %:
                    @endif
                </label>
                <input type="text" placeholder="Descuento de Cupón" wire:model="descuento">
                @error('descuento')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Carrito Monto-->
            <div class="contenedor_elemento_formulario">
                <label>Carrito Monto:</label>
                <input type="text" placeholder="Monto Carrito" wire:model="carrito_monto">
                @error('carrito_monto')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Fecha-->
            <div class="contenedor_elemento_formulario">
                <label>Fecha Expiración:</label>
                <input type="date" placeholder="Monto de Expiración" wire:model="fecha_expiracion">
                @error('fecha_expiracion')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Enviar-->
            <div class="contenedor_elemento_formulario formulario_boton_enviar">
                <input type="submit" value="Editar Cupón">
            </div>
        </form>

    </div>

</div>
