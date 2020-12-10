<x-guest-layout>
    <x-cart>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Product:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    My Product
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Order Reference:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $reference }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Subtotal:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    ${{ number_format($total, 2) }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Transaction Cost:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    0
                </dd>
            </div>

            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Total:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    ${{ number_format($total, 2) }}
                </dd>
            </div>
        </dl>

        <form method="POST" action="{{ route('transactions.store') }}" class="mt-4">
            @csrf

            <input type="hidden" name="order_id" value="{{ $id }}">
            <input type="hidden" name="subtotal" value="{{ $total }}">
            <input type="hidden" name="transaction_cost" value="0">
            <input type="hidden" name="total" value="{{ $total }}">
            <input type="hidden" name="reference" value="{{ $reference }}">
            <input type="hidden" name="currency" value="{{ $currency }}">

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">Pagar ${{ number_format($total, 2) }}</x-button>
            </div>
        </form>
    </x-cart>
</x-guest-layout>
