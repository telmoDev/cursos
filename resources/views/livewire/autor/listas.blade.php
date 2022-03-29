<div class="que-aprender-ahora mt-5">
    <h3 class="text-3xl font-bold">Autor: <span class="text-lg font-thin">{{ $autor->name }}</span></h3>
    <div class="temas grid grid-cols-4 gap-4 w-full">
        @foreach( $cursos as $key => $curso)
            @include('livewire.cursos._partes.grid_curso')
        @endforeach
    </div>
    <div class="">
        {{ $cursos->links() }}
    </div>
</div>
