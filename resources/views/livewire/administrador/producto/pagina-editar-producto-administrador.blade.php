<div class="contenedor_pagina_administrador">
    @section('tituloPagina', 'Producto | Editar')

    <div class="titulo_pagina">
        <h2>Actualizar Producto</h2>
    </div>

    <div>
        <x-jet-danger-button wire:click="$emit('eliminarProductoModal')">
            Eliminar producto
        </x-jet-danger-button>
    </div>

    <div class="contenedor_formulario" x-data>
        <!--Dropzone-->
        <div class="contenedor_elemento_formulario" wire:ignore>
            <form action="{{ route('administrador.producto.files', $producto) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>

        @if ($producto->imagenes->count())
            <div class="contenedor_elemento_formulario">
                <label for="nombre">Imagenes:</label>
                <div class="contenedor_formulario_imagen" style="display: flex;">
                    @foreach ($producto->imagenes as $imagen)
                        <div wire:key="imagen-{{ $imagen->id }}">
                            <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt="">
                            <x-jet-danger-button wire:click="eliminarImagen({{ $imagen->id }})"
                                wire:loading.attr="disabled" wire:target="eliminarImagen({{ $imagen->id }})">
                                <i class="fa-solid fa-xmark"></i>
                            </x-jet-danger-button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <hr>

        @livewire('administrador.producto.componente-estado-producto', ['productoEstado' => $producto], key('componente-estado-producto-' . $producto->id))

        <hr>

        <div>
            <!--<form wire:submit.prevent="editarProducto">-->
            <!--Categorias-->
            <div class="contenedor_elemento_formulario">
                <label>Categorias:</label>
                <select wire:model="categoria_id">
                    <option value="" selected disabled>Seleccione una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Subcategorias-->
            <div class="contenedor_elemento_formulario">
                <label>Subcategorias:</label>
                <select wire:model="producto.subcategoria_id">
                    <option value="" selected disabled>Seleccione una subcategoría</option>
                    @foreach ($subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                    @endforeach
                </select>
                @if ($this->subcategoria)
                    <!--Propiedad computada-->
                    @if ($this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                        <code>El producto varia en Color</code>
                    @elseif(!$this->subcategoria->tiene_color && $this->subcategoria->tiene_medida)
                        <code>El producto varia en Medida</code>
                    @elseif($this->subcategoria->tiene_color && $this->subcategoria->tiene_medida)
                        <code>El producto varia en Color y Medida</code>
                    @else
                        <code>El producto No tiene Variación</code>
                    @endif
                @endif
                @error('producto.subcategoria_id')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Marcas-->
            <div class="contenedor_elemento_formulario">
                <label>Marcas:</label>
                <select wire:model="producto.marca_id">
                    <option value="" selected disabled>Seleccione una marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                @error('producto.marca_id')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Nombre-->
            <div class="contenedor_elemento_formulario">
                <label>Nombre:</label>
                <input type="text" wire:model="producto.nombre">
                @error('producto.nombre')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Ruta-->
            <div class="contenedor_elemento_formulario">
                <label>Ruta:</label>
                <input type="text" wire:model="slug">
                @error('slug')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Sku-->
            <div class="contenedor_elemento_formulario">
                <label>SKU:</label>
                <input type="text" wire:model="sku">
                @error('sku')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Precio-->
            <div class="contenedor_elemento_formulario">
                <label>Precio:</label>
                <input type="number" wire:model="producto.precio" step="0.01">
                @error('producto.precio')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Descripcion Corta-->
            <div class="contenedor_elemento_formulario">
                <label>Descripcion Corta:</label>
                <textarea rows="3" wire:model="producto.descripcion"></textarea>
                @error('producto.descripcion')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Informacion-->
            <div class="contenedor_elemento_formulario" wire:ignore>
                <label>Información:</label>
                <textarea rows="3" wire:model="producto.informacion" x-data x-init="ClassicEditor.create($refs.miEditor, {
                        toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList']
                    })
                    .then(function(editor) {
                        editor.model.document.on('change:data', () => {
                            @this.set('producto.informacion', editor.getData())
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });" x-ref="miEditor">
                </textarea>
                @error('producto.informacion')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Puntos a ganar-->
            <div class="contenedor_elemento_formulario">
                <label>Puntos a ganar:</label>
                <input type="number" wire:model="producto.puntos_ganar" step="1">
                @error('producto.puntos_ganar')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Puntos tope canjeo-->
            <div class="contenedor_elemento_formulario">
                <label>Puntos tope canjeo:</label>
                <input type="number" wire:model="producto.puntos_tope" step="1">
                @error('producto.puntos_tope')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Tiene Detalle-->
            <div class="contenedor_elemento_formulario">
                <label>¿Tienes detalle?</label>
                <div class="estado">
                    <label>
                        <input type="radio" value="1" name="producto.tiene_detalle"
                            wire:model.defer="producto.tiene_detalle" x-on:click="$wire.tiene_detalle = 1">
                        Si
                    </label>

                    <label>
                        <input type="radio" value="0" name="producto.tiene_detalle"
                            wire:model.defer="producto.tiene_detalle" x-on:click="$wire.tiene_detalle = 0">
                        No
                    </label>
                </div>
                @error('producto.tiene_detalle')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Detalle-->
            <div class="contenedor_elemento_formulario" wire:ignore x-show="$wire.tiene_detalle">
                <label>Detalle:</label>
                <textarea rows="3" wire:model="producto.detalle" x-data x-init="ClassicEditor.create($refs.miEditor2, {
                        toolbar: ['insertTable', 'bold'],
                        table: {
                            contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                        }
                    })
                    .then(function(editor2) {
                        editor2.model.document.on('change:data', () => {
                            @this.set('producto.detalle', editor2.getData())
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });" x-ref="miEditor2">
                </textarea>
                @error('producto.detalle')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Tipo de Subcategoria-->
            @if ($this->subcategoria)
                <!--Propiedad computada-->
                @if (!$this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                    <!--Stock-->
                    <div class="contenedor_elemento_formulario">
                        <label>Stock:</label>
                        <input type="number" wire:model="producto.stock_total" step="1">
                        @error('producto.stock_total')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
            @endif
            <!--Enviar-->
            <div class="contenedor_elemento_formulario formulario_boton_enviar">
                <!--<input type="submit" value="Actualizar Producto">-->
                <x-jet-button wire:loading.attr="disabled" wire:target="editarProducto" wire:click="editarProducto">
                    Actualizar producto
                </x-jet-button>
            </div>
        </div>

        <hr>
        <br>

        @if ($this->subcategoria)
            @if ($this->subcategoria->tiene_medida && !$this->subcategoria->tiene_color)
                <div class="titulo_pagina">
                    <h2>Variación en medida</h2>
                </div>
                @livewire('administrador.producto.componente-varia-medida', ['producto' => $producto], key('producto.componente-varia-medida-' . $producto->id))
            @elseif ($this->subcategoria->tiene_color && $this->subcategoria->tiene_medida)
                <div class="titulo_pagina">
                    <h2>Variación en medida y color</h2>
                </div>
                @livewire('administrador.producto.componente-varia-medida-color', ['producto' => $producto], key('producto.componente-varia-medida-color-' . $producto->id))
            @elseif($this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                <div class="titulo_pagina">
                    <h2>Variación en color</h2>
                </div>
                @livewire('administrador.producto.componente-varia-color', ['producto' => $producto], key('producto.componente-varia-color-' . $producto->id))
            @endif
        @endif
    </div>
    @push('script')
        <script>
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una imagen al recuadro.",
                acceptedFiles: 'image/*',
                paramName: "file",
                maxFilesize: 2,
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('dropImagenes');
                }
            };

            Livewire.on('eliminarProductoModal', () => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar este producto.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('administrador.producto.pagina-editar-producto-administrador',
                            'eliminarProducto');
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })

            })

            Livewire.on('eliminarPivotColorModal', colorPivotId => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar esta medida.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('administrador.producto.componente-varia-color',
                            'eliminarPivotColor', colorPivotId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('eliminarPivotMedidaModal', medidaPivotId => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar esta medida.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('administrador.producto.componente-varia-medida',
                            'eliminarPivotMedida', medidaPivotId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('eliminarPivotMedidaColorModal', medidaColorPivotId => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar esta medida.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('administrador.producto.componente-varia-medida-color',
                            'eliminarPivotMedidaColor', medidaColorPivotId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })
            })

            //Modales de Variación
            /*Livewire.on('eliminarVariaMedidaModal', variaMedidaId => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar esta medida.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Livewire.emit('administrador.producto.varia-medida-stock', 'eliminarVariaMedida', variaMedidaId);
                        Livewire.emit('eliminarVariaMedida', variaMedidaId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })
            })

            Livewire.on('eliminarVariaMedidaColorModal', variaMedidaColorId => {
                Swal.fire({
                    title: '¿Quieres eliminar?',
                    text: "No podrás recupar esta medida.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        //Livewire.emitTo('administrador.producto.varia-medida-color-stock', 'eliminarVariaMedidaColor', variaMedidaColorId);
                        Livewire.emit('eliminarVariaMedidaColor', variaMedidaColorId);
                        Swal.fire(
                            '¡Eliminado!',
                            'Eliminaste correctamente.',
                            'success'
                        )
                    }
                })
            })*/
        </script>
    @endpush
</div>
