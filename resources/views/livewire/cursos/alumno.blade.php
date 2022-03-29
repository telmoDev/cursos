<div class="flex w-full" >
    <div class="w-4/6 pr-6">
        <h3 class="text-lg font-bold">{{ $mostrar_curso->titulo }}</h3>
        <div class="contenido">{{ $mostrar_curso->detalle }}</div>
    </div>
    <div class="w-2/6 border-2 h-full ">

        <div class="p-3 w-full border-b-2">Contenido del Curso</div>
            <div class="">
                <a href="{{ $curso->url() }}" class="block w-full h-40 bg-center bg-cover" style="background-image: url({{ $curso->imagen() }})"></a>
            </div>
            @foreach($curso->secciones as $key => $for_seccion)
                <div class="" x-data="{ detalle: {{ ( $for_seccion->id == $seccion )? 'true' : 'false' }} }">
                    <h4
                    x-on:click="detalle = ! detalle"
                    class="title text-lg font-bold border-2 p-2 cursor-pointer flex justify-between items-center">

                        <div>{{ $key + 1 }}.- {{ $for_seccion->titulo }} <span class="text-xs"></span></div>
                        <span x-show="detalle">
                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205" style="enable-background:new 0 0 205 205;" xml:space="preserve"><path d="M2.5,88.3v28.4h200V88.3H2.5z"/></svg>
                        </span>
                        <span x-show="!detalle">
                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205" style="enable-background:new 0 0 205 205;" xml:space="preserve"><path class="st0" d="M202.5,88.2h-85.7V2.5H88.2v85.7H2.5v28.6h85.7v85.7h28.6v-85.7h85.7V88.2z"/></svg>
                        </span>
                    </h4>
                    <div class="detalle" x-show="detalle" x-transition.duration.300ms>
                        @foreach($for_seccion->contenido as $for_contenido)
                        <div
                            wire:click="activar_curso({{$for_contenido->id}}, '{{$for_contenido->slug}}')"
                            class="flex  items-center justify-between cursor-pointer {{ ( $for_contenido->id == $contenido )? 'activo' : '' }} px-2"

                            >
                            <div class="flex  items-center ">
                                <input type="checkbox" class="cursor-pointer" {{ ( $for_contenido->id == $contenido )? 'checked' : '' }} >
                                <div class="mr-2 p-2"><svg class="w-4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 205 205.2" style="enable-background:new 0 0 205 205.2;" xml:space="preserve"><path d="M2.5,102.2C2.3,46.7,49,1,105.3,2.5c52,1.4,97.5,44.3,97.2,100.5h0c-0.1,26.5-10.7,51.9-29.6,70.6 c-18.8,18.7-44.3,29.1-70.8,29c-26.5-0.1-51.9-10.7-70.6-29.6C12.8,154.2,2.4,128.8,2.5,102.2L2.5,102.2z M150.3,104 c-1.3-1.8-2.8-3.4-4.5-4.9c-20-11.9-40.1-23.6-60.2-35.3c-5-2.9-9-0.9-9,4.9c-0.2,23.7-0.2,47.3,0,71c0,5.8,4,8,9,5.1 c20.3-11.7,40.5-23.6,60.6-35.6C147.6,108.2,148.5,106.1,150.3,104L150.3,104z"/></svg></div>
                                <div>{{ $for_contenido->titulo }}</div>
                            </div>
                            <div class="text-xs mr-2">00:48</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
    </div>
</div>
