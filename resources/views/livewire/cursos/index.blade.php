<div class="flex">
    <main class=" pr-4  w-full ">
        <div class="w-full">

            <div class="bg-black text-white p-6">
                <h1 class="title text-2xl font-bold">{{ $curso->nombre}}</h1>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_corta}}</div>
            </div>

            <div class="shadow-xl mt-5 p-4">
                <h3 class="title text-2xl font-bold mb-1">Detalle del curso</h3>

                <div class="grid grid-cols-4 gap-4" >
                    @foreach($curso->secciones as $key => $seccion)
                        @if( $this->Aprobado($seccion) )
                            {{-- Auth   --}}
                            <div class="relative">
                                <a href="{{ route('curso.seccion' , [$curso->slug, $seccion->contenido->first()->slug ])}}" class="block w-full h-64 bg-center bg-cover" style="background-image: url(https://picsum.photos/id/{{ ( $curso->id + 30) + ( $key * 2 ) }}/200/300)"></a>
                                <a href="{{ route('curso.seccion' , [$curso->slug, $seccion->contenido->first()->slug ])}}">{{ $seccion->titulo }}</a>
                                <div class=""><span class="text-xs">Número de contenido: {{ $seccion->contenido->count() }}</span></div>
                            </div>
                        @else
                            {{-- Guest --}}
                            <div class="relative flex flex-col">
                                <div class="relative">
                                    <div class="absolute w-full h-full bg-white opacity-25 flex justify-center items-center">
                                        <svg class="w-1/3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 430 322.8" style="enable-background:new 0 0 430 322.8;" xml:space="preserve"><g><path d="M187.6,107.7l13.7,40l-40-13.7c-8.4,16.3-8.4,35.3-1.6,51.6l94.2-69.5C235.5,99.8,209.2,97.2,187.6,107.7L187.6,107.7z"/><path d="M410.2,147.7c-2.1-2.6-21-25.8-53.7-50c-5.8-4.2-11.6-7.9-17.4-11.6l-38.9,28.9c11.1,5.8,21,12.1,29.5,18.4 c13.7,10,25.3,20.5,33.2,28.4c-7.9,7.9-19.5,18.4-33.2,28.4c-26.3,18.4-66.8,41-114.7,41c-21,0-40-4.2-57.9-10.5l-41,30.5 c32.1,15.8,65.8,24.2,98.9,24.2c47.9,0,96.3-17.4,141.5-50.5c32.6-24.2,51.6-47.4,53.7-50l0.5-0.5 C416.5,166.6,416.5,156.1,410.2,147.7L410.2,147.7z"/><path d="M257.6,204c17.9-17.9,22.1-44.7,12.1-66.8l-93.7,69.5C199.7,227.2,235,226.1,257.6,204L257.6,204z"/><path d="M19.8,175.1c2.1,2.6,21,25.8,53.7,50c5.8,4.2,11.6,7.9,17.4,11.6l38.9-28.9c-11.1-5.8-21-12.1-29.5-18.4 c-13.7-10-25.3-20.5-33.2-28.4c7.9-7.9,19.5-18.4,33.2-28.4c25.8-18.9,66.3-41,114.2-41c21,0,40,4.2,57.9,10.5l41-30.5 c-32.1-15.8-65.8-24.2-98.9-24.2c-47.9,0-96.3,17.4-141.6,50.5c-32.6,24.2-51.6,47.4-53.7,50l-0.5,0.5 C13.5,156.1,13.5,166.6,19.8,175.1L19.8,175.1z"/><path d="M421.1,2l6.3,8.5L8.9,320.8l-6.3-8.5L421.1,2z"/></g></svg>
                                    </div>
                                    <div class="block w-full h-64 bg-center bg-cover" style="background-image: url(https://picsum.photos/id/{{ ( $curso->id + 30) + ( $key * 2 ) }}/200/300);"></div>
                                </div>
                                <div>{{ $seccion->titulo }}</div>
                                <div class=""><span class="text-xs">Número de contenido: {{ $seccion->contenido->count() }}</span></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="shadow-xl mt-5 p-4">
                <h3 class="title text-2xl font-bold mb-1">Descripción</h3>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
                <div  class="mt-2 title text-lg ">{{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}} {{ $curso->descripcion_larga}}</div>
            </div>
        </div>
    </main>
    @if( ! $inscrito )
    <aside class="h-4 sticky top-0 w-1/5">
        <a href="{{ $curso->url() }}" class="block w-full h-32 bg-center" style="background-image: url({{ $curso->imagen() }})"></a>
        <div class="price text-2xl font-bold">$. {{ $curso->precio }}</div>
        <div class="btn text-lg mt-2 flex justify-between">
            <x-jet-button class="">
                {{ __('Comprar') }}
            </x-jet-button>
            <x-jet-button class="">
                {{ __('Fav') }}
            </x-jet-button>
        </div>
    </aside>
    @endif
</div>
