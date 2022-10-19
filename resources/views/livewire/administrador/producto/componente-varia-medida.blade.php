<div>
    <!--Formulario-->
    <form wire:submit.prevent="guardarMedida">
        <!--Stock-->
        <div class="contenedor_elemento_formulario">
            <label for="nombre">Nombre medida:</label>
            <input type="text" wire:model.defer="nombre" id="nombre" placeholder="Ingrese nombre.">
            @error('nombre')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
            <input type="submit" value="Agregar medida">
        </div>
    </form>
    <!--Lista-->
    @if ($medidas->count())
        <div>
            @foreach ($medidas as $medida)
                <div wire:key="medida-{{ $medida->id }}">
                    <div>
                        <div>
                            <p> {{ $medida->nombre }}</p>
                        </div>
                        <div>
                            <a wire:click="editarMedida({{ $medida->id }})" wire:loading.attr="disabled"
                                wire:target="editarMedida({{ $medida->id }})"><span><i class="fa-solid fa-pencil"
                                        style="color: green;"></i></span>Editar</a> |
                            <a wire:click="$emit('eliminarMedida', {{ $medida->id }})">
                                <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</a>
                        </div>
                    </div>
                    @livewire('administrador.producto.varia-medida-stock', ['medida' => $medida], key('color-medida-' . $medida->id))
                </div>
            @endforeach
        </div>
    @endif
    
    <!--Modal editar -->
    <x-jet-dialog-modal wire:model="abierto" wire:key="modal-medida-color-{{ $medida->id }}">
        <!--Titulo Modal-->
        <x-slot name="title">
            <div class="contenedor_modal">
                <h2>Editar Color</h2>
                <button wire:click="$set('abierto', false)" wire:loading.attr="disabled">
                    x
                </button>
            </div>
        </x-slot>
        <!--Contenido Modal-->
        <x-slot name="content">
            <!--Nombre-->
            <div class="contenedor_elemento_formulario">
                <label for="nombre_editado">Nombre medida:</label>
                <input type="text" wire:model.defer="nombre_editado" id="nombre_editado"
                    placeholder="Ingrese nombre.">
                @error('nombre_editado')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </x-slot>
        <!--Pie Modal-->
        <x-slot name="footer">
            <button wire:click="actualizarMedida" wire:loading.attr="disabled" wire:target="actualizarMedida"
                type="submit">
                Actualizar
            </button>
            <button wire:click="$set('abierto', false)" wire:loading.attr="disabled" type="submit">Cancelar</button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
