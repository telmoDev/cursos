<div>
    <div class="flex justify-end mr-5 mt-5">
        <x-jet-button wire:click="nuevo" wire:loading.attr="disabled">
            Nuevo
        </x-jet-button>
    </div>
    <div class="px-5 mb-5">
        <table class="table table-bordered mt-2 w-full">
            <thead class="bg-black text-white">
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th class="w-20"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $value)
                <tr class="border-b-2 border-gray-400">
                    <td class="text-center">{{ $value->id }}</td>
                    <td class="text-center">{{ $value->nombre }}</td>
                    <td class="text-center">{{ $value->descripcion }}</td>
                    <td class="text-center">
                        <div>Desde: {{ $value->fecha_inicio }}</div>
                        <div>Hasta: {{ $value->fecha_fin }}</div>
                    </td>
                    <td>
                        <div class="flex justify-end">
                            <a href="" aria-label="Edit" wire:click.prevent="edit({{ $value->id }})" class="btn-accion btn-edit mr-2">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 330 330" style="enable-background:new 0 0 330 330;" xml:space="preserve">
                                    <g>
                                        <path d="M75,180v60c0,8.284,6.716,15,15,15h60c3.978,0,7.793-1.581,10.606-4.394l164.999-165
                                            c5.858-5.858,5.858-15.355,0-21.213l-60-60C262.794,1.581,258.978,0,255,0s-7.794,1.581-10.606,4.394l-165,165
                                            C76.58,172.206,75,176.022,75,180z M105,186.213L255,36.213L293.787,75l-150,150H105V186.213z"></path>
                                        <path d="M315,150.001c-8.284,0-15,6.716-15,15V300H30V30H165c8.284,0,15-6.716,15-15s-6.716-15-15-15H15
                                            C6.716,0,0,6.716,0,15v300c0,8.284,6.716,15,15,15h300c8.284,0,15-6.716,15-15V165.001C330,156.716,323.284,150.001,315,150.001z"></path>
                                    </g>
                                </svg>
                            </a>
                            <a href="" aria-label="Borrar" wire:click.prevent="delete({{ $value->id }})" class="btn-accion btn-edit mr-2">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="488.936px" height="488.936px" viewBox="0 0 488.936 488.936" style="enable-background:new 0 0 488.936 488.936;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M381.16,111.948H107.376c-6.468,0-12.667,2.819-17.171,7.457c-4.504,4.649-6.934,11.014-6.738,17.477l9.323,307.69
                                                c0.39,12.92,10.972,23.312,23.903,23.312h20.136v-21.012c0-24.121,19.368-44.049,43.488-44.049h127.896
                                                c24.131,0,43.893,19.928,43.893,44.049v21.012h19.73c12.933,0,23.52-10.346,23.913-23.268l9.314-307.7
                                                c0.195-6.462-2.234-12.863-6.738-17.513C393.821,114.767,387.634,111.948,381.16,111.948z"></path>
                                            <path d="M309.166,435.355H181.271c-6.163,0-11.915,4.383-11.915,11.516v30.969c0,6.672,5.342,11.096,11.915,11.096h127.895
                                                c6.323,0,11.366-4.773,11.366-11.096v-30.969C320.532,440.561,315.489,435.355,309.166,435.355z"></path>
                                            <path d="M427.696,27.106C427.696,12.138,415.563,0,400.591,0H88.344C73.372,0,61.239,12.138,61.239,27.106v30.946
                                                c0,14.973,12.133,27.106,27.105,27.106H400.59c14.973,0,27.105-12.133,27.105-27.106L427.696,27.106L427.696,27.106z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="flex justify-end w-full">
        {{ $eventos->links() }}
    </div>

    <x-jet-dialog-modal wire:model="popupOpen">
        <x-slot name="title">
            <div>{{ $popup_tipo }} eventos</div>
        </x-slot>

        <x-slot name="content">
            <div style="width: 832px;"></div>
                @if( $popup_tipo == "Borrar" )
                    <div>¿Está seguro borrar <strong>{{ $evento->tema }} </strong>?</div>
                @else
                    <div class="usuario-perfiles w-full">
                        <div class="avatar flex items-center justify-center flex-col">
                            <div class="formularios w-full">
                                <div class="listado flex mb-2 flex-col w-full">
                                    <div class="box-entrada px-2 w-full">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                                        Nombre
                                        </label>
                                        <input
                                            type="text"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Nombre"
                                            wire:model.lazy="evento.nombre"
                                        >
                                    </div>
                                </div>
                                <div class="listado flex mb-2 flex-col w-full">
                                    <div class="box-entrada px-2 w-full">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                                        Descripción
                                        </label>
                                        <input
                                            type="text"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Descripción"
                                            wire:model.lazy="evento.descripcion"
                                        >
                                    </div>
                                </div>
                                <div class="listado flex mb-2 flex-col w-full">
                                    <div class="box-entrada px-2 w-full">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                                        Fecha Inicio
                                        </label>
                                        <input
                                            type="date"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Fecha Inicio"
                                            wire:model.lazy="evento.fecha_inicio"
                                        >
                                    </div>
                                </div>
                                <div class="listado flex mb-2 flex-col w-full">
                                    <div class="box-entrada px-2 w-full">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                                        Fecha Fin
                                        </label>
                                        <input
                                            type="date"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Fecha Fin"
                                            wire:model.lazy="evento.fecha_fin"
                                        >
                                    </div>
                                </div>
                                <div class="listado flex mb-2 flex-col w-full">
                                    <div class="box-entrada px-2 w-full">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="fecha_inicio">
                                        Observación
                                        </label>
                                        <textarea
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 w-full block rounded-none rounded-r-md sm:text-sm border-gray-300"
                                            placeholder="Observación"
                                            wire:model.lazy="evento.observacion"
                                        >
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('popupOpen')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2 btn-ingreso" wire:click="aceptar" wire:loading.attr="disabled">
                Aceptar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
