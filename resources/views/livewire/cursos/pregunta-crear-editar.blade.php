<div class="mb-4 sm:rounded-lg max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-4">
        <a href="{{ route('evaluacion.crear.editar') }}" class="flex items-center font-bold">
            <div class="mr-2">
                <i class="fa-solid fa-chevron-left"></i>
            </div>
            Regresar
        </a>
    </div>

    <div class="p-2 shadow bg-white">
        @foreach ($modulos as $keyModulo => $item)
            <div x-data="{ open: false }" class="mb-5 hover:border-[#5E2880] hover:border-2 p-2">
                <div @click="open = !open"
                    class="text-center flex items-center justify-center mb-4 rounded-md p-2 bg-gray-100 shadow-md cursor-default">
                    Modulo #{{ $keyModulo + 1 }} - {{ $item->titulo }} <div class="ml-2">
                        <div x-show="open">
                            <i class="fa-solid fa-chevron-up"></i>
                        </div>
                        <div x-show="!open">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>
                <div x-show="open" class="mb-2 p-2">
                    @include(
                        'livewire.cursos._partes._form._evaluacion.form_preguntas',
                        compact($keyModulo))
                </div>
            </div>
        @endforeach

    </div>
    <div class="flex justify-center mt-10">
        <button wire:loading.attr="disabled" wire:click="guarda"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Guardar
        </button>
    </div>
    <div wire:loading wire:target="guarda">
        @include('livewire.cursos._icons.loading')
    </div>
</div>
