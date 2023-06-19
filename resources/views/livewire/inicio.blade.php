<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
    <!-- Que aprender ahora  -->
    <div class="que-aprender-ahora mt-5 w-full">
        <div class="temas flex w-full gap-4 items-center transition-all ">
            @foreach( $cursos as $key => $curso)
                @include('livewire.cursos._partes.grid_curso_inicio')
            @endforeach
        </div>
    </div>
</div>
