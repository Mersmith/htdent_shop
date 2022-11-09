    <div class="resena_comentada_datos">
        @if ($resena->user->cliente->imagen_ruta)
            <img class="h-12 w-12 rounded-full object-cover" style="margin-right: 12px"
                src="{{ Storage::url(Auth::user()->cliente->imagen_ruta) }}" alt="{{ Auth::user()->cliente->nombre }}" />
        @else
            <img class="h-12 w-12 rounded-full object-cover" style="margin-right: 12px"
                src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}" />
        @endif
        <div>
            <p><strong>{{ Auth::user()->cliente->nombre }}</strong></p>
            <p>{{ date('d/m/Y') }}</p>
        </div>
    </div>
    <br>
    <form action="{{ route('resenas.respuesta', [$producto, $resena->id]) }}" method="POST">
        @csrf
        <textarea name="comentario" id="editor" cols="30" rows="3"></textarea>
        <x-jet-input-error for="comentario" />

        <input type="hidden" name="producto_id" value="{{ $producto_id }}" />

        <input type="hidden" name="padre_id" value="{{ $padre_id }}" />

        <div class="flex items-center mt-2" x-data="{ rating: 5 }" style="justify-content: flex-end;">
            <p class="font-semibold mr-3">Puntaje:</p>
            <ul class="flex space-x-2">
                <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">
                    <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                        <i class="fas fa-star"></i>
                    </button>
                </li>
                <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">
                    <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                        <i class="fas fa-star"></i>
                    </button>
                </li>
                <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">
                    <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                        <i class="fas fa-star"></i>
                    </button>
                </li>
                <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">
                    <button type="button" class="focus:outline-none" x-on:click="rating = 4">
                        <i class="fas fa-star"></i>
                    </button>
                </li>
                <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">
                    <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                        <i class="fas fa-star"></i>
                    </button>
                </li>
            </ul>
            <input name="puntaje" class="hidden" type="number" x-model="rating">
            <x-jet-button class="ml-auto">
                Comentar
            </x-jet-button>
        </div>
    </form>
