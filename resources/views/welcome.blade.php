<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Comprar Productos
        </h2>
    </x-slot>

    <x-product>
        <div class="flex" x-data="{ productQuantity: 1 }">
            <div class="flex-none w-48 relative">
                <x-application-logo class="absolute inset-0 w-full h-full object-cover" />
            </div>
            <form
                    class="flex-auto p-6"
                    method="GET"
                    action="{{ route('cart.show') }}">
                @csrf
                <input
                        type="hidden"
                        name="product_name"
                        value="my product">
                <input
                        type="hidden"
                        name="product_price"
                        value="110.00">
                <input
                        type="hidden"
                        name="product_quantity"
                        :value="productQuantity">
                <input
                        type="hidden"
                        name="product_currency"
                        value="COP">
                <div class="flex flex-wrap">
                    <h1 class="flex-auto text-xl font-semibold">
                        My Product
                    </h1>
                    <div class="text-xl font-semibold text-gray-500">
                        $110.00
                    </div>
                    <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
                        Description of the product
                    </div>
                </div>
                <div class="flex space-x-3 mt-4 mb-4 text-sm font-medium">
                    <div class="flex-auto flex space-x-3">
                        <button
                                @click="productQuantity <= 1? 1 : productQuantity--"
                                class="w-1/2 flex items-center justify-center rounded-md bg-gray-500 text-white"
                                type="button">-
                        </button>
                        <div
                                x-text="productQuantity"
                                id="div-quantity"
                                class="w-1/2 flex items-center justify-center rounded-md bg-transparent text-black">
                        </div>
                        <button
                                @click="productQuantity++"
                                class="w-1/2 flex items-center justify-center rounded-md bg-green-500 text-white"
                                type="button">+
                        </button>
                        <x-button>Comprar</x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-product>
</x-app-layout>