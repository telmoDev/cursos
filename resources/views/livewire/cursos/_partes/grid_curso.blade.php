<div
    x-data="{ tooltip: false }"
    class="box-curso tema text-center mb-4  ">
        <div class="relative">
        <a href="{{ $curso->url() }}" class="box-imagen block w-full h-32 bg-center   transition-all" style="background-image: url({{ $curso->imagen() }})"></a>
        <div class="text-left principal ">
            <h3 class="title  text-lg font-bold px-2 transition-all"><a href="{{ $curso->url() }}" class="block">{{ $curso->nombre}}</a></h3>
            <div class="price text-sm font-bold px-2">$. {{ $curso->precio }}</div>
            <livewire:carrito.agregar.modal :curso="$curso" />
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
