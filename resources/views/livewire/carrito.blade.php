<div>
    @php
        $subtotal = 0;
    @endphp
    <table class="w-full" >
        <thead>
            <tr>
                <th>N.</th>
                <th class="w-32">Curso</th>
                <th>Nombre</th>
                <th></th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @forelse( $carrito as $key => $car )
            <tr class="border-b-2 pb-2 mb-2">
                <td class="text-center">
                    {{ $key + 1 }}
                </td>
                <td>
                    <div style="background-image: url({{ $car->curso->imagen() }})" class="h-32 w-32 bg-center py-2"></div>
                </td>
                <td class="text-center px-3">
                    {{ $car->curso->nombre }}
                </td>
                <td class="text-center px-3">
                    <x-jet-danger-button wire:click="eleminarCarrito('{{ $car->id }}')" wire:loading.attr="disabled">
                    {{ 'Eliminar' }}
                    </x-jet-danger-button>
                </td>
                <td class="text-right px-3">$. {{ number_format( $car->curso->precio, 2 ) }}</td>
            </tr>
                @php
                    $subtotal = $subtotal + $car->curso->precio;
                @endphp
            @empty
            <tr>
                <td colspan="4">Sin elemento</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="w-full flex justify-end mt-2">
        <table class="w-1/3" >
            <tr>
                <th class="text-left">Subtotal: </th>
                <td class="text-right px-3">$. {{ number_format( $subtotal , 2 ) }}</td>
            </tr>
            <tr>
                <th class="text-left">IVA: </th>
                <td class="text-right px-3">$. {{ number_format( round( $subtotal * 0.14 , 2) ,  2) }}</td>
            </tr>
            <tr>
                <th class="text-left">TOTAL: </th>
                <td class="text-right px-3">$. {{ number_format( $subtotal + round( $subtotal * 0.14 , 2) , 2) }}</td>
            </tr>

        </table>
    </div>


</div>