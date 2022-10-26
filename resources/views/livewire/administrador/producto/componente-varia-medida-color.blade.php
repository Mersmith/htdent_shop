<div>
    <!--Formulario-->
    <div>
        <!--<form wire:submit.prevent="guardarMedida">-->
        <!--Nombre-->
        <div class="contenedor_elemento_formulario">
            <label>Nombre medida:</label>
            <input type="text" wire:model.defer="nombre" placeholder="Ingrese nombre de medida.">
            @error('nombre')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!--Enviar-->
        <div class="contenedor_elemento_formulario formulario_boton_enviar" style="width: 200px">
            <!--<input type="submit" value="Agregar medida">-->
            <x-jet-button wire:click="guardarMedida" wire:loading.attr="disabled" wire:target="guardarMedida">
                Agregar medida
            </x-jet-button>
        </div>
    </div>
    <hr>
    @if ($medidas->count())
        <!--Lista-->
        <div>
            @foreach ($medidas as $index => $medida)
                <div wire:key="medida-{{ $medida->id }}">
                    <div>
                        <div>
                            <p><strong>Medida: </strong> {{ $medida->nombre }}</p>
                        </div>
                        <div class="tabla_controles">
                            <button wire:click="editarMedida({{ $medida->id }})" wire:loading.attr="disabled"
                                wire:target="editarMedida({{ $medida->id }})"><span><i class="fa-solid fa-pencil"
                                        style="color: green;"></i></span>Editar</button> |
                            <button wire:click="$emit('eliminarPivotMedidaColorModal', {{ $medida->id }})">
                                <span><i class="fa-solid fa-trash" style="color: red;"></i></span>Eliminar</button>
                        </div>
                    </div>
                    @livewire('administrador.producto.varia-medida-color-stock', ['medida' => $medida], key('varia-medida-color-stock-' . $medida->id . '-' . $index))
                </div>
            @endforeach
        </div>
        <!--Modal editar -->
        <x-jet-dialog-modal wire:model="abierto" wire:key="modal-componente-medida-color-{{ $medida->id }}">
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
                    <label>Nombre medida:</label>
                    <input type="text" wire:model.defer="nombre_editado" placeholder="Ingrese nombre medida.">
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
