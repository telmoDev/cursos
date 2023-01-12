@extends('livewire.administrador-component')
@section('content')

<div>
  <div class="mb-3">
      <a href="{{route( 'evaluacion.crear.editar')}}" class="text-md rounded-lg  bg-[#6b2b83] text-white py-2 px-4" >
          Nuevo evaluación
      </a>
  </div>
  <table class="table table-bordered mt-2 w-full">
      <thead>
        <tr class="bg-gray-100">
          <th class="text-center" >#</th>
          <th class="text-center" >Tema</th>
          <th class="text-center" >Curso</th>
          <th class="text-center" >Preguntas</th>
          <th class="text-center" >Acciones</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($evaluaciones as $item)
              <tr class="odd:bg-white even:bg-gray-100">
                  <td class="text-center">{{ ($loop->index + 1) }}</td>
                  <td>{{ $item->titulo }}</td>
                  <td class="text-center">{{ $item->curso->nombre }}</td>
                  <td class="text-center">{{ $item->cantidad_preguntas }}</td>
                  <td>
                    <div class="flex justify-center items-center">
                      <div>
                          <a href="{{route( 'evaluacion.crear.editar', $item->id)}}" class="text-lg">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </a>
                      </div>
                      <div class="ml-4 cursor-pointer text-lg text-red-600" onclick="confirm('Esta seguro que desea eliminar este curso.') || event.stopImmediatePropagation()" wire:click="">
                        <i class="fa-solid fa-trash" ></i>
                      </div>
                  </div>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
    {{ $evaluaciones->links() }}

</div>

@endsection

