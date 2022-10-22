<div>
    <!--Formulario-->
    <form wire:submit.prevent="guardarMedida">
        <!--Nombre-->
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
    <hr>
    @if ($medidas->count())
        <!--Lista-->
        <div>
            @foreach ($medidas as $medida)
                <div wire:key="medida-{{ $medida->id }}">
                    <div>
                        <div>
                            <p><strong>Medida: </strong> {{ $medida->nombre }}</p>
                        </div>
                        <div class="tabla_controles">
                            <a wire:click="editarMedida({{ $medida->id }})" wire:loading.attr="disabled"
                                wire:target="editarMedida({{ $medida->id }})"><span><i class="fa-solid fa-pencil"
                                        style="color: green;"></i></span>Editar</a> |
                            <a wire:click="$emit('eliminarMedidaModal', {{ $medida->id }})">
                                <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</a>
                        </div>
                    </div>
                    @livewire('administrador.producto.varia-medida-color-stock', ['medida' => $medida], key('color-medida-' . $medida->id))
                </div>
            @endforeach
        </div>

        <!--Modal editar -->
        <x-jet-dialog-modal wire:model="abierto" wire:key="modal-medida-color-{{ $medida->id }}">
            <!--Titulo Modal-->
            <x-slot name="title">
                <div class="contenedor_titulo_modal">
                    <div>
                        <h2 style="font-weight: bold">Editar medida</h2>
                    </div>
                    <div>
                        <button wire:click="$set('abierto', false)" wire:loading.attr="disabled">
                            <i style="cursor: pointer; color: #666666;" class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
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
                <div class="contenedor_pie_modal">
                    <button style="background-color: #009eff;" wire:click="$set('abierto', false)"
                        wire:loading.attr="disabled" type="submit">Cancelar</button>

                    <button style="background-color: #ffa03d;" wire:click="actualizarMedida"
                        wire:loading.attr="disabled" wire:target="actualizarMedida" type="submit">Editar</button>
                </div>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
