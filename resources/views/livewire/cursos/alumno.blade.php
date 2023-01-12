<div x-data="{
    scroll: (elemento) => {
        avance = document.getElementsByTagName('header')[0].offsetHeight + (window.innerHeight * elemento);
        console.log(avance);
        window.scrollTo({ top: avance, behavior: 'smooth' });
    }
}" x-init="{ a: }">
    <div class="">
        @foreach ($contenido as $item)
            <div class="flex flex-col h-screen justify-center" id="introduccion">
                <div class="flex  {{ 0 ? 'flex-row' : 'flex-col' }} items-center">
                    <div class="flex flex-col {{ 0 ? 'w-1/2' : 'w-ful' }}">
                        <div class="text-center">
                            <div
                                class="border-8 py-5 px-8 text-center text-5xl font-bold uppercase text border-[#6b2b83] inline-block text-[#6b2b83]">
                                Introducción
                            </div>
                        </div>
                        <div class="text-center  text-2xl font-bold mt-4"> Innovación de modelos de negocios</div>
                        @if ($item->contenido_download)
                            <div class="text-center my-2">
                                <a href="{{ route('contenido.download.file', ['folder' => $curso->id, 'folder2' => $item->id, 'filename' => $item->contenido_download]) }}"
                                    download class="flex items-center justify-center">
                                    <div class="uppercase text-xl border-b-2">
                                        descargar contenido
                                    </div>
                                    <div style="width: 20px" class="ml-2">
                                        @include('livewire.cursos._icons.file_download')
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div class="text-center  text-2xl font-bold mt-4">
                            <x-jet-secondary-button type="text"
                                class="bg-[#6b2b83] text-white hover:text-white hover:opacity-90 active:bg-[#6b2b83] focus:border-none focus:shadow-none active:text-white"
                                @click="scroll({{ $loop->index + 1 }})" @keydown.enter="alert('Submitted!')">Siguiente
                            </x-jet-secondary-button>
                        </div>
                        <div class="text-center flex justify-center items-center text-sm font-bold mt-4"><span
                                class="mr-1">@include('livewire.cursos._icons.clock')</span>Toma 5 min</div>
                    </div>
                    @if (0)
                        <div class="w-1/2 h-screen">
                            img
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
        @if (true)
            <div class="flex cursor-pointer fixed right-8" style="top: 90%">
                <div class="bg-[#6b2b83] rounded-l-md p-3 hover:opacity-90" style="border-right: .5px solid #DB3634">
                    @include('livewire.cursos._icons.arrow_up')
                </div>
                <div class="bg-[#6b2b83] rounded-r-md p-3 cursor-pointer hover:opacity-90"
                    style="border-left: .5px solid #DB3634">
                    @include('livewire.cursos._icons.arrow_down')
                </div>
            </div>
        @endif
    </div>
    {{-- <div class="h-screen flex flex-col justify-center">
        <div class="">
            <iframe width="1216" height="515" src="https://www.youtube.com/embed/iHaxFWiW9v8"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <div class="flex justify-end">
                <x-jet-secondary-button @click="scroll(4)" class="mt-4">Más sobre el curso</x-jet-secondary-button>
            </div>
        </div>
    </div>
    <div class="h-screen flex flex-col">
        <div class="w-full mt-5 pr-6">
            <h3 class="text-lg font-bold">{{ $mostrar_curso->titulo }}</h3>
            <div class="contenido">{{ $mostrar_curso->detalle }}</div>
            <a href="{{ route('curso.evaluacion', $curso_slug) }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-4">
                {{ __('Evaluar') }}
            </a>
        </div>
    </div> --}}
</div
