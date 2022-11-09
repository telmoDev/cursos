<div class="que-aprender-ahora mt-5">
    <h3 class="text-3xl font-bold">Cursos</h3>
    <div class="grid  grid-cols-3 gap-4 mb-5">
        @foreach ($cursos as $curso)
            @include('livewire.cursos._partes.grid_curso_inicio')
        @endforeach
    </div>
    {{ $cursos->links() }}
</div>
