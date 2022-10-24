<div>
    <div class="mb-3">
        <a href="{{route( 'curso.crear')}}" class="text-md rounded-lg  bg-[#6b2b83] text-white py-2 px-4" >
            Nuevo curso
        </a>
    </div>
    <table class="table table-bordered mt-2 w-full">
        <thead>
          <tr class="bg-gray-100">
            <th class="text-center" >#</th>
            <th class="text-center" >Curso</th>
            <th class="text-center" >Inscritos</th>
            <th class="text-center" >Precio</th>
            <th class="text-center" >Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $item)
                <tr class="odd:bg-white even:bg-gray-100">
                    <td class="text-center">{{ ($loop->index + 1) }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td class="text-center">{{ $item->num_inscritos }}</td>
                    <td class="text-center">${{ $item->precio }}</td>
                    <td>
                        <div class="flex justify-center">
                            <div >
                                <x-jet-nav-link href="{{ route( 'curso', $item->slug ) }}" class="text-[#6b6c6f]  text-lg" >
                                    @include('livewire.cursos._icons.popup_link')
                                </x-jet-nav-link>
                            </div>
                            <div class="ml-4">
                                <x-jet-nav-link href="{{ route( 'curso.editar', $item->id ) }}" class="text-[#6b6c6f]  text-lg">
                                    @include('livewire.cursos._icons.edit')
                                </x-jet-nav-link>
                            </div>
                            <div class="ml-4 cursor-pointer" onclick="confirm('Esta seguro que desea eliminar este curso.') || event.stopImmediatePropagation()" wire:click="borrar({{ $item->id }})">
                                @include('livewire.cursos._icons.bin_red')
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $cursos->links() }}


      <script>
          function myConfirm() {
              const texto = 'Esta seguro que desea eliminaar este curso.'
              if (confirm(texto) === true) {

              }
          }
          document.addEventListener('livewire:load', function () {
          })
      </script>
</div>

