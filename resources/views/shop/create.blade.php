<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Shop') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('shops.store') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Shop Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Website -->
                <div>
                    <x-input-label for="website" :value="__('Website')" />
                    <x-text-input id="website" class="block mt-1 w-full" type="text" name="website"
                        :value="old('website')" required autofocus autocomplete="website" />
                    <x-input-error :messages="$errors->get('website')" class="mt-2" />
                </div>

                <!-- Contact No -->
                <div>
                    <x-input-label for="contact" :value="__('Contact No')" />
                    <x-text-input id="contact" class="block mt-1 w-full" type="text" name="contact"
                        :value="old('contact')" required autofocus autocomplete="contact" />
                    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                </div>

                <!-- Address -->
                <div>
                    <x-input-label for="address" :value="__('Shop Address')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        :value="old('address')" required autofocus autocomplete="address" />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <!-- Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-form-textarea id="description" name="description" rows="4" :value="old('description')" required
                        class="w-full" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />

                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Add Shop') }}
                    </x-primary-button>
                </div>

                <div class="text-center">
                    <x-nav-link href="{{ route('shops.index') }}">
                        Back to Shop List
                    </x-nav-link>

                </div>
            </form>
        </div>
    </div>
</x-app-layout>
