<div>
    <div class="mb-4">
        <a href="{{ route('curso.administrador') }}" class="flex items-center font-bold">
            <div class="mr-2">
                @include('livewire.cursos._icons.arrow_left')
            </div>
            Regresar
        </a>
    </div>
    <div>

        <form wire:submit.prevent="guardar">

            <div class="shadow p-2 hover:border-2 hover:border-[#6b2b83]">
                {{-- Detalle del curso --}}
                @include('livewire.cursos._partes._form._editar.form_general')
                <hr class="my-5">
                {{-- Reseña --}}
                @include('livewire.cursos._partes._form._editar.form_resenia_citas')
                {{-- end Reseña --}}
            </div>
            {{-- Bloques --}}
            @include('livewire.cursos._partes._form._editar.form_bloque_pagina')
            {{-- end Bloques --}}
            {{-- Syllabus --}}
            @include('livewire.cursos._partes._form._editar.form_secciones')
            {{-- end Syllabus --}}

            <div class="flex justify-center mt-5">
                <x-jet-button wire:loading.attr="disabled">
                    Guardar
                </x-jet-button>
            </div>
        </form>
        <div wire:loading wire:target="guardar">
            @include('livewire.cursos._icons.loading')
        </div>
    </div>

</div>
