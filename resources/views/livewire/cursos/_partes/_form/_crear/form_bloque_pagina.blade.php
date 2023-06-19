@foreach ($bloques as $key => $item)
    <hr class="my-5">
    <div class="hover:border-2 hover:border-[#6b2b83] p-2 border">
        <h3 class="text-lg">Información Bloque #{{ $key + 1 }}</h3>
        <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
            <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                Titulo
            </label>
            <input type="text"
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                placeholder="Titulo..." wire:model.lazy="bloques.{{$key}}.titulo">
            {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
        </div>
        <div class="box-entrada px-2 w-full mt-2 hover:order-1 hover:">
            <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                Subtitulo
            </label>
            <input type="text"
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                placeholder="Subtitulo..." wire:model.lazy="bloques.{{$key}}.subtitulo">
            {{-- @error("secciones.{$key}.contenido.{$keyc}.subtitulo")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
        </div>
        <div class="box-entrada px-2 w-full mt-2">
            <label class="block text-gray-700 text-sm font-bold mt-2" for="fecha_inicio">
                Detalle
            </label>
            <textarea
                class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                wire:model.lazy="bloques.{{$key}}.detalle" ></textarea>
            {{-- @error("secciones.{$key}.contenido.{$key}.detalle")
                    <div class="text-red-600 text-sm">{{ $message }}</div>
                @enderror --}}
        </div>
    </div>
@endforeach
