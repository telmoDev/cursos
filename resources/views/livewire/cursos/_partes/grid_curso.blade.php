<div
    x-data="{ tooltip: false }"
    x-on:mouseover="tooltip = true"
    x-on:mouseleave="tooltip = false"
    class="box-curso tema text-center mb-4  ">
        <div class="relative">
        <a href="{{ $curso->url() }}" class="box-imagen block w-full h-32 bg-center   transition-all" style="background-image: url({{ $curso->imagen() }})"></a>
        <div class="text-left principal ">
            <h3 class="title  text-lg font-bold px-2 transition-all"><a href="{{ $curso->url() }}" class="block">{{ $curso->nombre}}</a></h3>
            <div class="price text-sm font-bold px-2">$. {{ $curso->precio }}</div>
            <livewire:carrito.agregar.modal :curso="$curso" />
        </div>
        @if( $key % 4 == 3 )
        <div x-show="tooltip"
            class="text-sm text-black absolute border-2	shadow-md pb-4 transform bottom-0 w-full bg-white text-left left-auto right-full z-10"
            x-transition.duration.300ms
        >
        @else
            <div x-show="tooltip"
                class="text-sm text-black absolute border-2	shadow-md pb-4 transform bottom-0 w-full bg-white text-left left-full z-10"
                x-transition.duration.300ms
            >
        @endif
            <h3 class="title text-lg font-bold px-4 py-2 bg-gray-400 text-white"><a href="{{ $curso->url() }}">{{ $curso->nombre}}</a></h3>
            <div class="flex flex-col justify-end px-4 text-right">
                <div class="author text-xs"><strong>Autor:</strong> {{ $curso->autor->name }}</div>
                <div class="update text-xs"><strong>Actualizado:</strong> {{ $curso->updated_at->format('j m, Y') }}</div>
            </div>

            <div class="description text-base px-4">{{ $curso->descripcion_larga }}</div>
        </div>
    </div>
    <!-- <div class="btn text-lg mt-2 flex justify-end px-4"> -->

        {{--
            <x-jet-button class="">
                {{ __('Fav') }}
            </x-jet-button>
        --}}
    <!-- </div> -->
</div>
