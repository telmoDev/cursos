<div class="flex">
    <main class="w-4/5 pr-4">
        <div class="w-full">

            <div class="bg-black text-white p-6">
                <h1 class="title text-2xl font-bold">{{ $curso->nombre}}</h1>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_corta}}</div>
                <div class="mt-2 text-xs"><strong>Creado por:</strong> {{ $curso->autor->name }}</div>
                <div class="text-xs"><strong>Número de inscritos:</strong> {{ $curso->num_inscritos }}</div>
                <div class=" update text-xs"><strong>Última actualización:</strong> {{ $curso->updated_at->format('m/Y') }}</div>
            </div>

            <div class="shadow-xl mt-5 p-4">
                <h3 class="title text-2xl font-bold mb-1">Detalle del curso</h3>
                @foreach($curso->secciones as $seccion)
                    <div class="" x-data="{ detalle: false }">
                        <h4
                        x-on:click="detalle = ! detalle"
                        class="title text-lg font-bold border-2 p-2 cursor-pointer flex justify-between items-center">

                            <div>{{ $seccion->titulo }} - <span class="text-xs">Número de contenido: {{ $seccion->contenido->count() }}</span></div>
                            <span x-show="detalle">
                                <svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205" style="enable-background:new 0 0 205 205;" xml:space="preserve"><path d="M2.5,88.3v28.4h200V88.3H2.5z"/></svg>
                            </span>
                            <span x-show="!detalle">
                                <svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205" style="enable-background:new 0 0 205 205;" xml:space="preserve"><path class="st0" d="M202.5,88.2h-85.7V2.5H88.2v85.7H2.5v28.6h85.7v85.7h28.6v-85.7h85.7V88.2z"/></svg>
                            </span>
                        </h4>
                        <div class="detalle" x-show="detalle" x-transition.duration.300ms>
                            @foreach($seccion->contenido as $contenido)
                            <div class="flex  items-center justify-between ">
                                <div class="flex  items-center ">
                                    <div class="mr-2 p-2"><svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205.2" style="enable-background:new 0 0 205 205.2;" xml:space="preserve"><path d="M2.5,102.2C2.3,46.7,49,1,105.3,2.5c52,1.4,97.5,44.3,97.2,100.5h0c-0.1,26.5-10.7,51.9-29.6,70.6 c-18.8,18.7-44.3,29.1-70.8,29c-26.5-0.1-51.9-10.7-70.6-29.6C12.8,154.2,2.4,128.8,2.5,102.2L2.5,102.2z M150.3,104 c-1.3-1.8-2.8-3.4-4.5-4.9c-20-11.9-40.1-23.6-60.2-35.3c-5-2.9-9-0.9-9,4.9c-0.2,23.7-0.2,47.3,0,71c0,5.8,4,8,9,5.1 c20.3-11.7,40.5-23.6,60.6-35.6C147.6,108.2,148.5,106.1,150.3,104L150.3,104z"/></svg></div>
                                    <div>{{ $contenido->titulo }}</div>
                                </div>
                                <div class="text-xs mr-2">00:48</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach


            </div>
            <div class="shadow-xl mt-5 p-4">
                <h3 class="title text-2xl font-bold mb-1">Descripción</h3>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
            </div>
        </div>
    </main>
    <aside class="h-4 sticky top-0 w-1/5">
        <a href="{{ $curso->url() }}" class="block w-full h-32 bg-center" style="background-image: url({{ $curso->imagen() }})"></a>
        <div class="price text-2xl font-bold">{{ $curso->precio }}</div>
        <div class="btn text-lg mt-2 flex justify-between">
            <x-jet-button class="">
                {{ __('Comprar') }}
            </x-jet-button>
            <x-jet-button class="">
                {{ __('Fav') }}
            </x-jet-button>
        </div>
    </aside>
</div>
