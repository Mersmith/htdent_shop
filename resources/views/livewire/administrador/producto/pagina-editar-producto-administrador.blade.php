<div class="contenedor_pagina_administrador">
    <div class="titulo_pagina">
        <h2>Actualizar Producto</h2>
    </div>

    <div class="contenedor_formulario" x-data>
        <!--Dropzone-->
        <div class="contenedor_elemento_formulario" wire:ignore>
            <form action="{{ route('administrador.producto.files', $producto) }}" method="POST" class="dropzone"
                id="my-awesome-dropzone"></form>
        </div>
        <div class="contenedor_elemento_formulario">
            <label for="nombre">Imagenes:</label>
            <div class="contenedor_formulario_imagen">
                @if ($producto->imagenes->count())
                    @foreach ($producto->imagenes as $imagen)
                        <div wire:key="imagen-{{ $imagen->id }}">
                            <img src="{{ Storage::url($imagen->imagen_ruta) }}" alt="">
                            <button wire:click="eliminarImagen({{ $imagen->id }})" wire:loading.attr="disabled"
                                wire:target="eliminarImagen({{ $imagen->id }})">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <hr>

        @livewire('administrador.producto.componente-estado-producto', ['productoEstado' => $producto])

        <hr>

        <form wire:submit.prevent="editarProducto">
            <!--Categorias-->
            <div class="contenedor_elemento_formulario">
                <label for="categoria_id">Categorias:</label>
                <select wire:model="categoria_id" id="categoria_id">
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
                <label for="producto.subcategoria_id">Subcategorias:</label>
                <select wire:model="producto.subcategoria_id" id="producto.subcategoria_id">
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
                <label for="producto.marca_id">Marcas:</label>
                <select wire:model="producto.marca_id" id="producto.marca_id">
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
                <label for="producto.nombre">Nombre:</label>
                <input type="text" wire:model="producto.nombre" id="producto.nombre">
                @error('producto.nombre')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Ruta-->
            <div class="contenedor_elemento_formulario">
                <label for="slug">Ruta:</label>
                <input type="text" wire:model="slug" id="slug">
                @error('slug')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Sku-->
            <div class="contenedor_elemento_formulario">
                <label for="sku">SKU:</label>
                <input type="text" wire:model="sku" id="sku">
                @error('sku')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Precio-->
            <div class="contenedor_elemento_formulario">
                <label for="producto.precio">Precio:</label>
                <input type="number" wire:model="producto.precio" id="producto.precio" step="0.01">
                @error('producto.precio')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Descripcion Corta-->
            <div class="contenedor_elemento_formulario">
                <label for="producto.descripcion">Descripcion Corta:</label>
                <textarea rows="3" wire:model="producto.descripcion" id="producto.descripcion"></textarea>
                @error('producto.descripcion')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Informacion-->
            <div class="contenedor_elemento_formulario" wire:ignore>
                <label for="producto.informacion">Información:</label>
                <textarea rows="3" wire:model="producto.informacion" id="producto.informacion" x-data x-init="ClassicEditor.create($refs.miEditor, {
                        toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList']
                    })
                    .then(function(editor) {
                        editor.model.document.on('change:data', () => {
                            @this.set('producto.informacion', editor.getData())
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });"
                    x-ref="miEditor">
                </textarea>
                @error('producto.informacion')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Puntos a ganar-->
            <div class="contenedor_elemento_formulario">
                <label for="producto.puntos_ganar">Puntos a ganar:</label>
                <input type="number" wire:model="producto.puntos_ganar" id="producto.puntos_ganar" step="1">
                @error('producto.puntos_ganar')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Puntos tope canjeo-->
            <div class="contenedor_elemento_formulario">
                <label for="producto.puntos_tope">Puntos tope canjeo:</label>
                <input type="number" wire:model="producto.puntos_tope" id="producto.puntos_tope" step="1">
                @error('producto.puntos_tope')
                    <span>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!--Tiene Detalle-->
            <div class="contenedor_elemento_formulario">
                <label for="producto.tiene_detalle">¿Tienes detalle?</label>
                <div class="estado">
                    <label>
                        <input type="radio" value="1" name="producto.tiene_detalle"
                            wire:model.defer="producto.tiene_detalle" id="producto.tiene_detalle"
                            x-on:click="$wire.tiene_detalle = 1">
                        Si
                    </label>

                    <label>
                        <input type="radio" value="0" name="producto.tiene_detalle"
                            wire:model.defer="producto.tiene_detalle" id="producto.tiene_detalle"
                            x-on:click="$wire.tiene_detalle = 0">
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
                <label for="producto.detalle">Detalle:</label>
                <textarea rows="3" wire:model="producto.detalle" id="producto.detalle" x-data x-init="ClassicEditor.create($refs.miEditor2, {
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
                    });"
                    x-ref="miEditor2">
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
                        <label for="producto.stock_total">Stock:</label>
                        <input type="number" wire:model="producto.stock_total" id="producto.stock_total"
                            step="1">
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
                <input type="submit" value="Actualizar Producto">
            </div>
        </form>

        <hr>
        @if ($this->subcategoria)
            @if ($this->subcategoria->tiene_medida && !$this->subcategoria->tiene_color)
                @livewire('administrador.producto.componente-varia-medida', ['producto' => $producto], key('producto.componente-varia-medida-' . $producto->id))
            @elseif ($this->subcategoria->tiene_color && $this->subcategoria->tiene_medida)
                @livewire('administrador.producto.componente-varia-medida-color', ['producto' => $producto], key('producto.componente-varia-medida-color-' . $producto->id))
            @elseif($this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                @livewire('administrador.producto.componente-varia-color', ['producto' => $producto], key('producto.componente-varia-color-' . $producto->id))
            @endif
        @endif
    </div>
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
    </script>
@endpush
