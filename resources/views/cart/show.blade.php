<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito
        </h2>
    </x-slot>

    <x-cart>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Producto:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $productName }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Cantidad:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ $productQuantity }}
                </dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Precio:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    ${{ number_format($productPrice, 2) }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">
                    Total:
                </dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    ${{ number_format($total, 2) }}
                </dd>
            </div>
        </dl>

        <form method="POST" action="{{ route('orders.store') }}" class="mt-4">
        @csrf

        <input type="hidden" name="product_price" value="{{ $productPrice }}">
        <input type="hidden" name="product_quantity" value="{{ $productQuantity }}">
        <input type="hidden" name="product_currency" value="{{ $productCurrency }}">

        <!-- Name -->
        <div>
            <x-label for="name" value="Nombres" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name ?? '')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" value="Correo" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email ?? '')" required />
        </div>

        @guest
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" value="Contraseña" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="Repita Contraseña" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>
        @endguest

        <!-- Mobile -->
        <div class="mt-4">
            <x-label for="mobile" value="Teléfono" />

            <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile', $user->phone ?? '')" required />
        </div>

        <!-- State -->
        <div class="mt-4">
            <x-label for="state_id" value="Departamento" name="state_id"/>

            <select class="block mt-1 w-full" name="state_id">
                @foreach($states as $key => $state)
                    <option value="{{ $key }}" {{ ($user->state_id ?? '') === $key ? 'selected': '' }}>{{ $state }}</option>
                @endforeach
            </select>
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-label for="city" value="Ciudad" />

            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $user->city ?? '')" required />
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-label for="address" value="Dirección" />

            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $user->address ?? '')" />
        </div>

        <!-- Postal Code -->
        <div class="mt-4">
            <x-label for="postal_code" value="Codigo Postal" />

            <x-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code', $user->postal_code ?? '')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/">
                Volver
            </a>

            <x-button class="ml-4">Comprar</x-button>
        </div>
        </form>
    </x-cart>
</x-app-layout>
