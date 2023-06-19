<div class="h-screen bg-white max-w-7xl px-2 pt-2 shadow-lg"  x-transition>
  <div class="p-2 bg-[#6b2b83] text-white shadow-lg rounded-md flex w-[fit-content] mb-3" @click="open = !open">
    <i x-show="open" x-transition class="fa-solid fa-xmark"></i>
    <i x-show="!open" x-transition class="fa-solid fa-bars"></i>
  </div>

  <x-admin-menu-item nombre="Cursos" ruta="curso.administrador" icono="fa-solid fa-bookmark"/>
  <x-admin-menu-item nombre="Evaluaciones" ruta="evaluacion.admin" icono="fa-solid fa-file-pen"/>
  <x-admin-menu-item nombre="Categoría" ruta="evaluacion.categoria.admin" icono="fa-solid fa-list"/>
  <x-admin-menu-item nombre="Usuario" ruta="evaluacion.user.admin" icono="fa-solid fa-user"/>
</div>
