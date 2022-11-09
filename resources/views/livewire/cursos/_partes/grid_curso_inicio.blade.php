<div
    x-data="{ open: false }"
    class="box-curso tema text-center  w-full font-acephimere"
    @mouseleave="open = false"
    x-transition.duration.250ms
    >
    <div class="relative shadow-2xl" @mouseover="open = true" x-transition.duration.250ms>
        <div class="w-full bg-[#80009d] text-white py-2 text-center text-xl font-bold" x-transition.duration.250ms x-show="open">¡ME INSCRIBO!</div>
        <div class="imagen relative">
            <a href="{{ $curso->url() }}" class="box-imagen block w-full h-64 bg-center bg-cover  transition-all" style="background-image: url({{$curso->imagen()}})"></a>
            <svg class="opacity-70 w-1/2 absolute bottom-0 translate-y-1/2 right-0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 71 56.4" style="enable-background:new 0 0 71 56.4;" xml:space="preserve"><g><polygon  style="fill:none;stroke:#FFFFFF;stroke-width:0.45;stroke-miterlimit:10;" points="54.9,28.2 69.9,8.1 69.9,0.9 61.4,0.9 48,18.9 34.5,0.9 26.3,0.9 26.3,8.4 41.1,28.2 26.3,47.9 26.3,55.5 34.5,55.5 48,37.5 61.4,55.5 69.9,55.5 69.9,48.3"/><polygon  style="fill:none;stroke:#FFFFFF;stroke-width:0.45;stroke-miterlimit:10;" points="9.3,55.5 1.1,55.5 1.1,47.9 15.9,28.2 1.1,8.4 1.1,0.9 9.3,0.9 29.7,28.2 "/></g></svg>
        </div>
        <div class="text-left principal bg-[#ff2d00] py-4">
            <div class="flex justify-end relative z-10">
                <h3 class=" text-xl font-bold px-4 transition-all w-2/3  text-white text-right">{{ $curso->nombre}}</h3>
            </div>
            <div class="relative z-10 px-4 text-white italic text-right pl-12 transition-all" x-transition.duration.250ms x-show="open">{{ $curso->descripcion_corta }}</div>
            <div class="text-[#80009d] font-bold px-4 pt-5 text-right">
                <div class="text-sm">En línea / 120h</div>
                <div class="text-3xl -mt-1 tracking-tight font-bold">{{ $curso->precio }} USD</div>
            </div>
        </div>
        <div class="bg-white p-3"  x-transition.duration.250ms x-show="open">
            <a class="font-bold border-[#80009d] text-[#80009d] border-2 border-black block" href="{{ $curso->url() }}">Más información</a>
        </div>
    </div>
</div>
