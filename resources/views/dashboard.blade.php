<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="border-collapse border border-green-800 m-5">
                        <thead>
                        <tr>
                            <th class="border border-green-600 w-20">#</th>
                            <th class="border border-green-600 w-40">Referencia</th>
                            <th class="border border-green-600 w-40">Cliente</th>
                            <th class="border border-green-600 w-40">Correo</th>
                            <th class="border border-green-600 w-40">Telefono</th>
                            <th class="border border-green-600 w-40">Estado</th>
                            <th class="border border-green-600 w-40">Total</th>
                            <th class="border border-green-600 w-60">Acción</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @forelse($orders as $order)
                            <tr class="hover:bg-blue-50">
                                <td class="border border-green-600">{{ $order['id'] }}</td>
                                <td class="border border-green-600">{{ $order['reference'] }}</td>
                                <td class="border border-green-600">{{ $order['customer_name'] }}</td>
                                <td class="border border-green-600">{{ $order['customer_email'] }}</td>
                                <td class="border border-green-600">{{ $order['customer_mobile'] }}</td>
                                <td class="border border-green-600">{{ $order['status'] }}</td>
                                <td class="border border-green-600">${{ number_format($order['total'], 2) }}</td>
                                <td class="border border-green-600">
                                    <a
                                            href="{{ route('payments.response', $order['id']) }}"
                                            class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Ver transaccion
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td class="col-span-6">No existen ordenes disponibles</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
