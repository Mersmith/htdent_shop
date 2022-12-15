<div class="contenedor_pagina_administrador">
    @section('tituloPagina', 'Producto | Editar')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">ACTUALIZAR</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.producto.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
        <button wire:click="$emit('eliminarProductoModal')">
            Eliminar producto
        </button>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador" x-data>
        <!--Dropzone-->
        <div class="contenedor_elemento_formulario" wire:ignore>
            <form action="{{ route('administrador.producto.files', $producto) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>
        <!--Imagenes-->
        @if ($producto->imagenes->count())
            <div class="contenedor_1_elementos_imagen">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Imagenes: </p>
                    <div class="contenedor_imagenes_subir" id="sortableimagenes">
                        @foreach ($producto->imagenes->sortBy('posicion') as $key => $imagen)
                            <div wire:key="imagen-{{ $imagen->id }}" style="position: relative;"
                                data-id="{{ $imagen->id }}">
                                <img class="handle2 cursor-grab" style="width: 100px; height: 100px; object-fit: cover;"
                                    src="{{ Storage::url($imagen->imagen_ruta) }}" alt="">
                                <button wire:click="eliminarImagen({{ $imagen->id }})" wire:loading.attr="disabled"
                                    wire:target="eliminarImagen({{ $imagen->id }})">
                                    <i class="fa-solid fa-xmark" style="color: white;"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </label>
            </div>
        @endif
        <br>
        <hr>
        <!--Estado-->
        @livewire('administrador.producto.componente-estado-producto', ['productoEstado' => $producto], key('componente-estado-producto-' . $producto->id))
        <hr>
        <div class="formulario">
            <!--<form wire:submit.prevent="editarProducto">-->
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Categorias-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Categorias: </p>
                    <select wire:model="categoria_id">
                        <option value="" selected disabled>Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Subcategorias-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Subcategorias: </p>
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
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Marcas-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Marca:</p>
                    <select wire:model="producto.marca_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                    @error('producto.marca_id')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Nombre-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Nombre:</p>
                    <input type="text" wire:model="producto.nombre">
                    @error('producto.nombre')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Ruta-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Slug:</p>
                    <input type="text" wire:model="slug">
                    @error('slug')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Sku-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">SKU:</p>
                    <input type="text" wire:model="sku">
                    @error('sku')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>

            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Precio Real-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Precio real:</p>
                    <input type="number" wire:model="producto.precio_real" step="0.01">
                    @error('producto.precio_real')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Precio Oferta-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Precio oferta:</p>
                    <input type="number" wire:model="producto.precio" step="0.01">
                    @if ($producto->precio)
                        @if ($producto->precio == $producto->precio_real)
                            <code>No tiene descuento.</code>
                        @elseif($producto->precio_real > $producto->precio)
                            <code>Tiene un descuento de:
                                %{{ 100 - (100 * $producto->precio) / $producto->precio_real }}</code>
                        @else
                            <code>El precio de Oferta tiene que ser menor al precio Real.</code>
                        @endif
                    @endif
                    @error('producto.precio')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Descripcion Corta-->
            <div class="contenedor_1_elementos_100">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Descripción corta: </p>
                    <textarea rows="3" wire:model="producto.descripcion"></textarea>
                    @error('producto.descripcion')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Link Video-->
            <div class="contenedor_1_elementos_100">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Link video youtube embed: </p>
                    <textarea rows="3" wire:model="link_video"></textarea>
                    @error('link_video')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Informacion-->
            <div class="contenedor_1_elementos_100" wire:ignore>
                <label class="label_principal">
                    <p class="estilo_nombre_input">Información: </p>
                    <textarea rows="3" wire:model="producto.informacion" x-data x-init="ClassicEditor.create($refs.miEditor, {
                            toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList', 'uploadImage'],
                            simpleUpload: {
                                uploadUrl: '{{ route('administrador.ckeditor.upload') }}'
                            }
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

                </label>
            </div>
            @error('producto.informacion')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Puntos a ganar-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Puntos a ganar: </p>
                    <input type="number" wire:model="producto.puntos_ganar" step="1">
                    @error('producto.puntos_ganar')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Puntos tope canjeo-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Monto carrito: </p>
                    <input type="number" wire:model="producto.puntos_tope" step="1">
                    @error('producto.puntos_tope')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Tiene Detalle-->
            <div class="contenedor_1_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">¿Tiene detalle?: </p>
                    <div>
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
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Detalle-->
            <div class="contenedor_1_elementos_100" wire:ignore x-show="$wire.tiene_detalle">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Detalle: </p>
                    <textarea rows="3" wire:model="detalle" x-data x-init="ClassicEditor.create($refs.miEditor2, {
                            toolbar: ['insertTable', 'bold'],
                            table: {
                                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
                            }
                        })
                        .then(function(editor2) {
                            editor2.model.document.on('change:data', () => {
                                @this.set('detalle', editor2.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });" x-ref="miEditor2">
                </textarea>

                </label>
            </div>
            @error('detalle')
                <span>{{ $message }}</span>
            @enderror
            <!--Tipo de Subcategoria-->
            @if ($this->subcategoria)
                <!--Propiedad computada-->
                @if (!$this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                    <!--Stock-->
                    <div class="contenedor_1_elementos">
                        <label class="label_principal">
                            <p class="estilo_nombre_input">Stock: </p>
                            <input type="number" wire:model="stock_total" step="1">

                        </label>
                    </div>
                @endif
            @endif
            @error('stock_total')
                <span>{{ $message }}</span>
            @enderror
            <!--Enviar-->
            <div class="contenedor_1_elementos">
                <!--<input type="submit" value="Actualizar Producto">-->
                <button wire:loading.attr="disabled" wire:target="editarProducto" wire:click="editarProducto">
                    Actualizar producto
                </button>
            </div>
        </div>
        <hr>
        <br>
        @if ($this->subcategoria)
            @if ($this->subcategoria->tiene_medida && !$this->subcategoria->tiene_color)
                <!--Titulo-->
                <h2 class="contenedor_paginas_titulo">VARIACIÓN EN MEDIDA</h2>
                @livewire('administrador.producto.componente-varia-medida', ['producto' => $producto], key('producto.componente-varia-medida-' . $producto->id))
            @elseif ($this->subcategoria->tiene_color && $this->subcategoria->tiene_medida)
                <!--Titulo-->
                <h2 class="contenedor_paginas_titulo">VARIACIÓN EN MEDIDA Y COLOR</h2>
                @livewire('administrador.producto.componente-varia-medida-color', ['producto' => $producto], key('producto.componente-varia-medida-color-' . $producto->id))
            @elseif($this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                <!--Titulo-->
                <h2 class="contenedor_paginas_titulo">VARIACIÓN EN COLOR</h2>
                @livewire('administrador.producto.componente-varia-color', ['producto' => $producto], key('producto.componente-varia-color-' . $producto->id))
            @endif
        @endif
    </div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            //https://sortablejs.github.io/Sortable/
            new Sortable(sortableimagenes, {
                handle: '.handle2',
                animation: 150,
                ghostClass: 'bg-blue-100',
                store: {
                    set: function(sortable) {
                        const sorts = sortable.toArray();
                        //console.log(sorts);
                        Livewire.emitTo('administrador.producto.pagina-editar-producto-administrador',
                            'cambiarPosicionImagenes', sorts);
                    },
                    onStart: function(evt) {
                        console.log(evt.oldIndex);
                    },
                }
            });
        </script>

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
