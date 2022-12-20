<div class="contenedor_menu_carrito">
    <x-jet-dropdown>
        <x-slot name="trigger">
            <div style="display: flex;">
                <div style="position: relative;">
                    @if (Cart::instance('wishlist')->count() > 0)
                        <p class="cantidad_carrito">{{Cart::instance('wishlist')->count()}}</p>
                    @endif
                    <i class="fa-solid fa-heart" style="color: #ffa03d;"></i>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            @forelse (Cart::instance('wishlist')->content() as $item)
                <div class="contenedor_modal_carrito">
                    <img class="object-cover mr-4" style="width: 50px;" src="{{ $item->options->imagen }}"
                        alt="">
                    <article>
                        <h1>{{ $item->name }}</h1>
                        {{-- <h1>{{ $item->rowId }}</h1> --}}
                        <p>Cant: {{ $item->qty }} </p>
                        <p>${{ number_format($item->price, 2) }} </p>
                        @isset($item->options['color'])
                            <p>color: {{ $item->options['color'] }} </p>
                        @endisset
                        @isset($item->options['medida'])
                            <p>Medida: {{ $item->options['medida'] }} </p>
                        @endisset
                    </article>
                </div>
                <hr>
            @empty
                <div>
                    <p>No eligió ningún producto :( .</p>
                </div>
            @endforelse
            @if (Cart::count())
                <div class="contenedor_ir_carrito">
                    <a href="{{ route('cliente.favoritos') }}">
                        Ir favoritos
                    </a>
                </div>
            @endif
        </x-slot>

    </x-jet-dropdown>
</div>
