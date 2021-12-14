
<div>
    <div class="box-entrada px-2 w-full">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
            Name
        </label>
        <input
            type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Name"
            wire:model="nombre"
        >
    </div>
    <div class="box-entrada px-2 w-full mt-2">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
            Descripción
        </label>
        <input
            type="text"
            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
            placeholder="Descripción"
            wire:model="description"
        >
    </div>

    <div class="box-entrada px-2 w-full mt-2">
        @foreach( $allPermissions as $key => $permiso )
            <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox" wire:model="permisos.{{$permiso->id}}" >
                <span class="ml-2">{{ $permiso->name  }} </span>
            </label>
        @endforeach
    </div>

</div>

