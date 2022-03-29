<div class="btn text-lg mt-2 flex justify-end px-4">
    <x-jet-button class="add" wire:click="add" >
        {{ __('Agregar al carrito') }}
    </x-jet-button>
    @auth
    <x-jet-dialog-modal wire:model="agregar_carrito">
        <x-slot name="title">
            Añadido a la cesta
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center">
                <div class="imagen" style="width: 20%;">
                    <div style="background-image: url({{ $curso->imagen() }})" class="h-32 w-32 bg-center"></div>
                </div>
                <div class="detalle px-5 text-left" style="width: 60%;">
                    <h3 class="font-bold text-lg">{{ $curso->nombre}}</h3>
                    <p class="text-xs">{{ $curso->descripcion_larga}}</p>
                </div>
                <div class="ir_a_la_cesta" style="width: 20%;">
                    <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                        Ir a la cesta
                    </x-jet-danger-button>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('agregar_carrito')" wire:loading.attr="disabled">
                Cerrar
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    @endauth
</div>
