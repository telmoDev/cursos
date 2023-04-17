<x-guest-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Curso') }}
      </h2>
  </x-slot>

  <div class="pb-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white  sm:rounded-lg">
            <livewire:cursos.pregunta-crear-editar :idCurso="$idCurso" />
          </div>
      </div>
  </div>

</x-guest-layout>

