<div>
    <div class="mb-4">
        <a href="{{ route('curso.administrador') }}" class="flex items-center font-bold">
            <div class="mr-2">
              <i class="fa-solid fa-chevron-left"></i>
            </div>
            Regresar
        </a>
    </div>
    <form wire:submit.prevent="guardar">

        <div class="shadow p-2 hover:border-2 hover:border-[#6b2b83]">
            {{-- Detalle del curso --}}
            @include('livewire.cursos._partes._form._crear.form_general')
            <hr class="my-5">
            {{-- Reseña --}}
            @include('livewire.cursos._partes._form._crear.form_resenia_citas')
            {{-- end Reseña --}}



        </div>
        {{-- Syllabus --}}
        @include('livewire.cursos._partes._form._crear.form_secciones')
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
