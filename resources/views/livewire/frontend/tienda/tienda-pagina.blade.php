<div class="contenedor_pagina_tienda">
    <div class="contenedor_filtro_tienda">
        <!--Rango de Precio-->
        <div style="border-bottom: 1.5px solid #cfd3d9; margin: 10px;">
            <div class="titulo_filtro" style="margin-bottom: 15px;">
                <h2>FILTRAR POR PRECIO:</h2>
            </div>
            <div class="flex justify-center items-center">
                <div x-data="range()" x-init="mintrigger();
                maxtrigger()" class="relative w-full">
                    <!--Rango-->
                    <div>
                        <input wire:model="minimo" type="range" step="0" x-bind:min="min"
                            x-bind:max="max" x-on:input="mintrigger" x-model="minprice"
                            class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                        <input wire:model="maximo" type="range" step="100" x-bind:min="min"
                            x-bind:max="max" x-on:input="maxtrigger" x-model="maxprice"
                            class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                        <div class="relative z-10 h-2">

                            <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

                            <div class="absolute z-20 top-0 bottom-0 rounded-m color_filtro"
                                x-bind:style="'right:' + maxthumb + '%; left:' + minthumb + '%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-0 left-0 rounded-full -mt-2 -ml-1 color_filtro"
                                x-bind:style="'left: ' + minthumb + '%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-0 right-0  rounded-full -mt-2 -mr-3 color_filtro"
                                x-bind:style="'right: ' + maxthumb + '%'"></div>

                        </div>
                    </div>
                    <!--Precios-->
                    <div class="flex justify-between items-center py-5">
                        <p class="px-3 py-2 border border-gray-200 rounded w-24 text-center">$<span
                                x-text="minprice"></span></p>
                        <p class="px-3 py-2 border border-gray-200 rounded w-24 text-center">$<span
                                x-text="maxprice"></span></p>
                        {{-- <div>
                            <input disabled type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice"
                                class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                        </div>
                        <div>
                            <input disabled type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice"
                                class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
        <!--Categorias-->
        <div style="margin: 10px; border-bottom: 1.5px solid #cfd3d9;">
            <div class="titulo_filtro">
                <h2>CATEGORIAS:</h2>
            </div>
            <ul>
                @foreach ($categorias as $categoriaItem)
                    <li class="my-2 text-sm">
                        <a wire:click="$set('categoria', '{{ $categoriaItem->id }}')"
                            style="color: {{ $categoria == $categoriaItem->id ? '#ffa03d' : '' }}"
                            class="cursor-pointer hover:text-orange "><i class="fa-solid fa-box"></i>
                            {{ $categoriaItem->nombre }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        @if ($categoria)
            <!--Subcategorias-->
            <div style="margin: 10px; border-bottom: 1.5px solid #cfd3d9;">
                <div class="titulo_filtro">
                    <h2>SUBCATEGORIAS:</h2>
                </div>
                <ul>
                    @foreach ($subcategorias as $subcategoriaItem)
                        <li class="my-2 text-sm">
                            <a wire:click="$set('subcategoria', '{{ $subcategoriaItem->id }}')"
                                style="color: {{ $subcategoria == $subcategoriaItem->id ? '#ffa03d' : '' }}"
                                class="cursor-pointer hover:text-orange "><i class="fa-solid fa-box"></i>
                                {{ $subcategoriaItem->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--Marcas-->
            <div style="margin: 10px; border-bottom: 1.5px solid #cfd3d9;">
                <div class="titulo_filtro">
                    <h2>MARCAS:</h2>
                </div>
                <ul>
                    @foreach ($marcas as $marcaItem)
                        <li class="my-2 text-sm">
                            <a wire:click="$set('marca', '{{ $marcaItem->nombre }}')"
                                style="color: {{ $marca == $marcaItem->nombre ? '#ffa03d' : '' }}"
                                class="cursor-pointer hover:text-orange"><i class="fa-solid fa-box"></i>
                                {{ $marcaItem->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!--Eliminar filtros-->
            <div style="display: flex;justify-content: center;">
                <button wire:click="limpiarFiltro">
                    Eliminar Filtros
                </button>
            </div>
        @endif
    </div>
    <div class="contenedor_filtro_productos" >
        <div class="col-span-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($productos as $producto)
                    <div class="item_slider_producto" style="margin-bottom: 30px;">
                        <div class="slider_producto_imagen">
                            @if ($producto->imagenes->count())
                                <img src="{{ Storage::url($producto->imagenes->first()->imagen_ruta) }}"
                                    alt="" />
                            @else
                                <img src="{{ asset('imagenes/producto/sin_foto_producto.png') }}">
                            @endif
                            <span> <i class="fa-solid fa-heart" style="color: #ffa03d; cursor: pointer;"></i>
                            </span>
                        </div>
                        <div style="text-align: center;">
                            <h2 class="slider_producto_nombre">{{ $producto->nombre }}</h2>
                            <p class="slider_producto_descripcion">{{ Str::limit($producto->descripcion, 35) }} </p>
                        </div>
                        <div style="text-align: center;">
                            <p class="slider_producto_precio">${{ $producto->precio }}</p>
                            <button class="slider_producto_boton">
                                <a href="{{ route('producto.index', $producto) }}">
                                    Ver más
                                </a>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="md:col-span-2 lg:col-span-4">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div style="padding: 10px 0px;">{{ $productos->links() }} </div>
    </div>
</div>
@push('script')
    <script>
        function range() {
            return {
                minprice: 0, //Minimo inicio
                maxprice: 7000, //Máximo inicio
                min: 0, //Salto
                max: 40000, //Máximo fin
                minthumb: 0,
                maxthumb: 0,

                mintrigger() {
                    this.minprice = Math.min(this.minprice, this.maxprice - 500);
                    this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                },

                maxtrigger() {
                    this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                    this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                },
            }
        }
    </script>
@endpush
