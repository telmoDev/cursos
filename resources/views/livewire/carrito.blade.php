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

    <script src="https://cdn.paymentez.com/ccapi/sdk/payment_checkout_stable.min.js"></script>

    <div class="flex justify-end mt-5">
        <div class="">
            <button class="js-payment-checkout inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition add">Pagar con Paymentez</button>
            <div id="response"></div>
        </div>
    </div>

    <script>
    let paymentCheckout = new PaymentCheckout.modal({
        client_app_code: 'TPP3-EC-CLIENT', // Client Credentials
        client_app_key: 'ZfapAKOk4QFXheRNvndVib9XU3szzg', // Client Credentials
        locale: 'es', // User's preferred language (es, en, pt). English will be used by default.
        env_mode: 'stg', // `prod`, `stg`, `local` to change environment. Default is `stg`
        onOpen: function () {
        console.log('modal open');
        },
        onClose: function () {
        console.log('modal closed');
        },
        onResponse: function (response) { // The callback to invoke when the Checkout process is completed

        /*
            In Case of an error, this will be the response.
            response = {
            "error": {
                "type": "Server Error",
                "help": "Try Again Later",
                "description": "Sorry, there was a problem loading Checkout."
            }
            }

            When the User completes all the Flow in the Checkout, this will be the response.
            response = {
            "transaction":{
                "status": "success", // success or failure
                "id": "CB-81011", // transaction_id
                "status_detail": 3 // for the status detail please refer to: https://paymentez.github.io/api-doc/#status-details
            }
            }
        */
        console.log('modal response');
        document.getElementById('response').innerHTML = JSON.stringify(response);
        }
    });

    let btnOpenCheckout = document.querySelector('.js-payment-checkout');
    btnOpenCheckout.addEventListener('click', function () {
        paymentCheckout.open({
        user_id: '1234',
        user_email: 'jhon@doe.com', //optional
        user_phone: '7777777777', //optional
        order_description: '1 Green Salad',
        order_amount: {{ number_format( $subtotal + round( $subtotal * 0.14 , 2) , 2) }},
        order_vat: 0,
        order_reference: '#234323411',
        //order_installments_type: 2, // optional: The installments type are only available for Ecuador and Mexico. The valid values are: https://paymentez.github.io/api-doc/#payment-methods-cards-debit-with-token-base-case-installments-type
        //order_taxable_amount: 0, // optional: Only available for Ecuador. The taxable amount, if it is zero, it is calculated on the total. Format: Decimal with two fraction digits.
        //order_tax_percentage: 10 // optional: Only available for Ecuador. The tax percentage to be applied to this order.
        });
    });

    window.addEventListener('popstate', function () {
        paymentCheckout.close();
    });
    </script>

</div>
