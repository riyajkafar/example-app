<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class=" text-gray-900">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-center">Create Product</h2>
                    <form action="{{ route('products.store') }}" method="POST">

                        @csrf

                        <!-- Product Name -->
                        <div>
                            <x-input-label for="name" :value="__('Product Name')" />
                            <x-text-input id="name" type="text" name="name" :value="old('name')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Quantity -->
                        <div>
                            <x-input-label for="quantity" :value="__('Quantity')" />
                            <x-text-input id="quantity" type="number" name="quantity" :value="old('quantity')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" type="text" name="price" :value="old('price')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-form-textarea id="description" name="description" rows="4" :value="old('description')"
                                required class="w-full" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Brand -->
                        <div>
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" type="text" name="brand" :value="old('brand')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <x-text-input id="category" type="text" name="category" :value="old('category')" required
                                class="w-full" />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Add Product') }}
                            </x-primary-button>
                        </div>

                        <div class="text-center">
                            <x-nav-link href="{{ route('products.index') }}">
                                Back to Product List
                            </x-nav-link>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
