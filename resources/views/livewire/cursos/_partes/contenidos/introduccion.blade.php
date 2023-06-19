<div id="view_{{$key}}" class="w-full h-screen flex flex-col justify-center items-center">
<h1 class="inline-block text-4xl mx-auto uppercase border-4 font-bold border-[#5E2880] text-center px-8 py-4">{{ $item->titulo }}</h1>
<p class="font-bold capitalize text-2xl">{{ $item->subtitulo }}</p>
<button class="rounded-md p-2 capitalize font-bold text-lg text-white bg-[#5E2880]" @click="scroll('view_{{$key}}')">comenzar</button>
</div>
