<div class="flex w-full" >
    <div class="w-4/6 pr-6">
        <h3 class="text-lg font-bold">Evaluación del curso: {{ $curso->nombre }}</h3>
        @foreach( $pregunta_mostrar as $key => $pregunta )
            <div class="mt-5 ">
                <div class="text-xl">{{ $key + 1 }}.- {{ $pregunta->titulo }}</div>
                @foreach( $pregunta->evaluacionRespuesta as $key2 => $respuestas )
                    <label class="border-2 border-black mt-2 p-3 block cursor-pointer">
                        <input type="radio" class=" mr-2 disabled" name="elemento-{{ $key + 1 }}"
                            wire:click="respuestas('{{ $key }}','{{ $pregunta->id }}','{{ $respuestas->id }}')"
                        >{{ $respuestas->titulo }}
                    </label>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="w-2/6 border-2 h-full sticky top-1">
        <div class="p-3 w-full border-b-2">Preguntas resueltas</div>
        <div class="mb-2">
            <a href="{{ $curso->url() }}" class="block w-full h-40 bg-center bg-cover" style="background-image: url({{ $curso->imagen() }})"></a>
        </div>
        <div class="grid grid-cols-4 gap-4 px-2">
            @foreach( $repositorioRespuestas as $key => $pregunta )
                <div class="text-sm border-2 border-black mt-2 p-3 block text-center @if( $pregunta['contestada'] ) bg-black text-white @endif">{{ $key + 1 }} </div>
            @endforeach
        </div>
        <div class="px-2 mt-2 mb-2">
            <x-jet-button type="button" class="w-full text-center" wire:click="enviar">
                {{ __('Enviar') }}
            </x-jet-button>
        </div>
        <div class="nota px-2 mb-2">
            <strong>Calificación: </strong>{{ $calificacion }}
        </div>
    </div>
</div>
