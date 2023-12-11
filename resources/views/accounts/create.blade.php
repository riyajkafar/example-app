<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create an Account') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ route('accounts.store') }}" class="account-form">
                        @csrf

                        <div class="form-group">
                            <x-input-label for="account_holder_name" :value="__('Account Holder Name')" />
                            <x-text-input id="account_holder_name" class="block mt-1 w-full" type="text" name="account_holder_name" required />
                        </div>

                        <div class="form-group">
                            <x-input-label for="account_number" :value="__('Account Number')" />
                            <x-text-input id="account_number" class="block mt-1 w-full" type="text" name="account_number" required />
                        </div>

                        <div class="form-group">
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required />
                        </div>

                        <div class="form-group">
                            <x-input-label for="nic_number" :value="__('NIC Number')" />
                            <x-text-input id="nic_number" class="block mt-1 w-full" type="text" name="nic_number" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Save Account') }}
                            </x-primary-button>
                        </div>
                        <div class="text-center">
                            <x-nav-link href="{{ route('accounts.index') }}">
                              Back to Accounts List
                            </x-nav-link>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>