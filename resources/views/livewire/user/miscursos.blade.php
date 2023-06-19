<div class="mt-5">
    <h3 class="text-3xl font-bold">Mis cursos</h3>
    <div class="temas grid grid-cols-4 gap-4 w-full">
        @foreach( $mis_cursos as $key => $micurso )
            @php
                $curso = $micurso->curso;
            @endphp
            @include('livewire.cursos._partes.grid_curso_mis_cursos')
        @endforeach
    </div>

</div>
