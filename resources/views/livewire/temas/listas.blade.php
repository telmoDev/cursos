<div class="que-aprender-ahora mt-5">

    <h3 class="text-3xl font-bold">Tema de interés: <span class="text-lg font-thin">{{ $tema->nombre }}</span></h3>
    <div class="temas grid grid-cols-4 gap-4 w-full mt-2">
        @foreach( $cursos as $key => $curso)
            @include('livewire.cursos._partes.grid_curso')
        @endforeach
    </div>
    <div class="">
        {{ $cursos->links() }}
    </div>
</div>
