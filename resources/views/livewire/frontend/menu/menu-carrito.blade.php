<div class="contenedor_menu_carrito">
    <x-jet-dropdown width="96">

        <x-slot name="trigger">
            <span class="monto_total">$0.00</span>
            @if (Cart::count())
                <p>{{ Cart::count() }} </p>
            @endif
            <i class="fa-solid fa-cart-shopping" style="color: #666666;"></i>
        </x-slot>
        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li style="margin-bottom: 5px;">
                        <img class="object-cover mr-4" style="width: 50px;" src="{{ $item->options->imagen }}"
                            alt="">
                        <article>
                            <h1>{{ $item->name }}</h1>
                            {{-- <h1>{{ $item->rowId }}</h1> --}}
                            <p>Cant: {{ $item->qty }} </p>
                            <p>USD {{ $item->price }} </p>
                            @isset($item->options['color'])
                                <p>color: {{ $item->options['color'] }} </p>
                            @endisset
                            @isset($item->options['medida'])
                                <p>Medida: {{ $item->options['medida'] }} </p>
                            @endisset
                        </article>
                        <br>
                    </li>
                @empty
                    <div>
                        <p>No eligió ningún producto :( .</p>
                    </div>
                @endforelse
            </ul>
            @if (Cart::count())
                <div>
                    <p>Total: USD {{ Cart::subtotal() }} </p>
                </div>
                <div>
                    <button href="#">
                        Ir al carrito
                    </button>
                </div>
            @endif
        </x-slot>

    </x-jet-dropdown>
</div>
