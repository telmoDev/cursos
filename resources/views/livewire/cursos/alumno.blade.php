<div
    x-data="{ scroll: (elemento) => { avance = document.getElementsByTagName('header')[0].offsetHeight + ( window.innerHeight * elemento );console.log(avance);window.scrollTo({top: avance, behavior: 'smooth'}); }}"
    x-init="scroll(0)"
>
    <div class=""
    >
        <div class="flex flex-col h-screen justify-center" id="introduccion"
        >
            <div class="flex flex-col">
                <div class="border-4 p-5 text-center text-4xl font-bold uppercase text border-gray-200">Introducción</div>
                <div class="text-center  text-2xl font-bold mt-4"> Innovación de modelos de negocios</div>
                <div class="text-center  text-2xl font-bold mt-4"><x-jet-secondary-button @click="scroll(1)" >Siguiente</x-jet-secondary-button></div>
                <div class="text-center  text-sm font-bold mt-4">Toma 5 min</div>
            </div>
        </div>
        <div class="flex flex-col h-screen justify-center"   >
            <div class="flex flex-col">
                <div class="text-center  text-2xl font-bold mt-4">Te gustaría saber mucho más sobre este curso</div>
                <div class="text-center  text-2xl font-bold mt-4"><x-jet-secondary-button @click="scroll(2)">Siguiente</x-jet-secondary-button></div>
            </div>
        </div>
        <div class="flex flex-col h-screen justify-center"  >
            <div class="flex flex-col">
                <div class="text-center  text-2xl font-bold mt-4">Mientras más conocimiento una persona tenga sobre algo o alguien, más poder tendrá.</div>
                <div class="text-center  text-2xl font-bold mt-4"><x-jet-secondary-button @click="scroll(3)">Comenzar</x-jet-secondary-button></div>
            </div>
        </div>

    </div>
    <div class="h-screen flex flex-col justify-center">
        <div class="">
            <iframe width="1216" height="515" src="https://www.youtube.com/embed/iHaxFWiW9v8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="flex justify-end">
                <x-jet-secondary-button @click="scroll(4)" class="mt-4">Más sobre el curso</x-jet-secondary-button>
            </div>
        </div>
    </div>
    <div class="h-screen flex flex-col">
        <div class="w-full mt-5 pr-6">
            <h3 class="text-lg font-bold">{{ $mostrar_curso->titulo }}</h3>
            <div class="contenido">{{ $mostrar_curso->detalle }}</div>
            <a
                href="{{ route('curso.evaluacion', $curso_slug ) }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-4"
            >
                {{ __('Evaluar') }}
            </a>
        </div>
    </div>
</div
