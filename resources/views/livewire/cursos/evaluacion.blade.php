<div class="flex w-full" >
    <div class="w-4/6 pr-6">
        <h3 class="text-lg font-bold">Evaluación del curso: {{ $curso->nombre }}</h3>
        @if( !$fin_de_curso )
        <div class="mt-5 ">
            <div class="text-xl">{{ $pregunta_mostrar["pregunta"] }}</div>
            @foreach( $pregunta_mostrar["opciones"] as $option )
                <label class="border-2 border-black mt-2 p-3 block cursor-pointer"><input type="checkbox" class=" mr-2 disabled" "> {{ $option }}</label>
            @endforeach
        </div>
        <div class="flex justify-between mt-10">
            <x-jet-button type="button" class="" wire:click="siguiente">
                {{ __('Anterior') }}
            </x-jet-button>
            <x-jet-button type="button" class="" wire:click="siguiente">
                {{ __('Siguiente') }}
            </x-jet-button>
        </div>
        @else
            <div>
                <div class="mt-5">
                    <p><strong>Nota:</strong> 5/7 </p>
                </div>
            </div>
        @endif
    </div>
    <div class="w-2/6 border-2 h-full ">
        <div class="p-3 w-full border-b-2">Preguntas</div>
        <div class="mb-2">
            <a href="{{ $curso->url() }}" class="block w-full h-40 bg-center bg-cover" style="background-image: url({{ $curso->imagen() }})"></a>
        </div>
        @foreach( $preguntas_respuesta as $key => $preguntas )
            <div class="flex  items-center justify-start cursor-pointer  px-2 mb-2">
                <label class="cursor-pointer">
                    <input type="checkbox" class=" mr-2 disabled" @if( $preguntas['contestada'] ) checked @endif disabled>
                    {{ $preguntas['pregunta'] }}
                </label>
            </div>
        @endforeach

    </div>
</div>
