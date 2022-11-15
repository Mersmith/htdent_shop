<div class="contenedor_pagina_administrador">
    @section('tituloPagina', 'Producto | Crear')
    <!--Titulo-->
    <h2 class="contenedor_paginas_titulo">CREAR NUEVO PRODUCTO</h2>
    <!--Boton regresar-->
    <div class="contenedor_boton_titulo">
        <a href="{{ route('administrador.producto.index') }}">
            <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
    </div>
    <!--Contenedor Página-->
    <div class="contenedor_paginas_administrador">
        <form wire:submit.prevent="crearProducto" x-data class="formulario">
            <!--Estado-->
            <div class="contenedor_1_elementos">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Estado: </p>
                    <div>
                        <label>
                            <input type="radio" value="1" name="estado" wire:model.defer="estado">
                            Publicado
                        </label>
                        <label>
                            <input type="radio" value="2" name="estado" wire:model.defer="estado">
                            Borrador
                        </label>
                    </div>
                    @error('estado')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Imagenes-->
            <div class="contenedor_1_elementos_imagen">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Imagenes: </p>
                    <div class="contenedor_subir_imagen_sola" style="width: 100px; height: 100px;">
                        <img style="width: 100px; height: 100px;"
                            src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                        <div class="opcion_cambiar_imagen">
                            Subir <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>
                    <div class="contenedor_imagenes_subir">
                        @if ($imagenes)
                            @foreach ($imagenes as $imagen)
                                <img style="width: 100px; height: 100px; object-fit: cover;"
                                    src="{{ $imagen->temporaryUrl() }}">
                            @endforeach
                        @endif
                        <input type="file" wire:model="imagenes" multiple style="display: none" id="imagenes">
                    </div>
                    @error('imagenes.*')
                        <span>{{ $message }} </span>
                    @enderror
                </label>
            </div>
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
                    <select wire:model="subcategoria_id">
                        <option value="" selected disabled>Seleccione una subcategoría</option>

                        @foreach ($subcategorias as $subcategoria)
                            <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre }}</option>
                        @endforeach
                    </select>
                    @if ($subcategoria_id)
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
                    @error('subcategoria_id')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Marcas-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Marca:</p>
                    <select wire:model="marca_id">
                        <option value="" selected disabled>Seleccione una marca</option>

                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                        @endforeach
                    </select>
                    @error('marca_id')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Nombre-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Nombre:</p>
                    <input type="text" wire:model="nombre" id="nombre">
                    @error('nombre')
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
                    <input type="number" wire:model="precio_real" step="0.01">
                    @error('precio_real')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Precio Oferta-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Precio oferta:</p>
                    <input type="number" wire:model="precio">
                    @if ($precio)
                        @if ($precio == $precio_real)
                            <code>No tiene descuento.</code>
                        @elseif($precio_real > $precio)
                            <code>Tiene un descuento de: %{{ 100 - (100 * $precio) / $precio_real }}</code>
                        @else
                            <code>El precio de Oferta tiene que ser menor al precio Real.</code>
                        @endif
                    @endif
                    @error('precio')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Descripcion Corta-->
            <div class="contenedor_1_elementos_100">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Descripción corta: </p>
                    <textarea rows="3" wire:model="descripcion"></textarea>
                    @error('descripcion')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Informacion-->
            <div class="contenedor_1_elementos_100" wire:ignore>
                <label class="label_principal">
                    <p class="estilo_nombre_input">Información: </p>
                    <textarea rows="3" wire:model="informacion" x-data x-init="ClassicEditor.create($refs.miEditor, {
                            toolbar: ['bold', 'italic', 'link', 'undo', 'redo', 'bulletedList']
                        })
                        .then(function(editor) {
                            editor.model.document.on('change:data', () => {
                                @this.set('informacion', editor.getData())
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });" x-ref="miEditor">
                    </textarea>
                </label>
            </div>
            @error('informacion')
                <span>{{ $message }}</span>
            @enderror
            <!--Dos input-->
            <div class="contenedor_2_elementos">
                <!--Puntos a ganar-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Puntos a ganar: </p>
                    <input type="number" wire:model="puntos_ganar" step="1">
                    @error('puntos_ganar')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
                <!--Puntos tope canjeo-->
                <label class="label_principal">
                    <p class="estilo_nombre_input">Monto carrito: </p>
                    <input type="number" wire:model="puntos_tope" step="1">
                    @error('puntos_tope')
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
                            <input type="radio" value="1" name="tiene_detalle"
                                wire:model.defer="tiene_detalle" x-on:click="$wire.tiene_detalle = 1">
                            Si
                        </label>
                        <label>
                            <input type="radio" value="0" name="tiene_detalle"
                                wire:model.defer="tiene_detalle" x-on:click="$wire.tiene_detalle = 0">
                            No
                        </label>
                    </div>
                    @error('tiene_detalle')
                        <span>{{ $message }}</span>
                    @enderror
                </label>
            </div>
            <!--Detalle-->
            <div class="contenedor_1_elementos_100" wire:ignore x-show="$wire.tiene_detalle">
                <label class="label_principal">
                    <p class="estilo_nombre_input">Detalle: </p>
                    <textarea rows="3" wire:model="detalle" id="detalle" x-data x-init="ClassicEditor.create($refs.miEditor2, {
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
                <span>{{ $message }} </span>
            @enderror
            <!--Tipo de Subcategoria-->
            @if ($subcategoria_id)
                <!--Propiedad computada-->
                @if (!$this->subcategoria->tiene_color && !$this->subcategoria->tiene_medida)
                    <!--Stock-->
                    <div class="contenedor_1_elementos">
                        <label class="label_principal">
                            <p class="estilo_nombre_input">Stock: </p>
                            <input type="number" wire:model="stock_total" step="1">
                            @error('stock_total')
                                <span>{{ $message }}</span>
                            @enderror
                        </label>
                    </div>
                @endif
            @endif
            <!--Enviar-->
            <div class="contenedor_1_elementos">
                <input type="submit" value="Crear Producto">
            </div>
        </form>
    </div>
</div>
