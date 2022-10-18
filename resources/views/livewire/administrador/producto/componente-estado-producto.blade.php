<form wire:submit.prevent="actualizarEstadoProducto">
    <!--Estado-->
    <div class="contenedor_elemento_formulario">
        <label for="estado">Estado del Producto:</label>
        <div class="estado">
            <label>
                <input type="radio" value="1" name="estado" wire:model.defer="estado" id="estado">
                Publicado
            </label>

            <label>
                <input type="radio" value="2" name="estado" wire:model.defer="estado" id="estado">
                Borrador
            </label>
        </div>
        @error('estado')
            <span>
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <!--Enviar-->
    <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
        <input type="submit" value="Actualizar estado">
    </div>
</form>
