<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Account') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{ route('accounts.update', $account->id) }}" class="space-y-4">
                @csrf
                @method('put')

                <div>
                    <x-input-label for="account_holder_name">Account Holder Name:</x-input-label>
                    <x-text-input id="account_holder_name" class="block mt-1 w-full" type="text"
                        name="account_holder_name" :value="$account->account_holder_name" required autofocus />
                </div>

                <div>
                    <x-input-label for="account_number">Account Number:</x-input-label>
                    <x-text-input id="account_number" class="block mt-1 w-full" type="text" name="account_number"
                        :value="$account->account_number" required />
                </div>

                <div>
                    <x-input-label for="address">Address:</x-input-label>
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        :value="$account->address" required />
                </div>

                <div>
                    <x-input-label for="nic_number">NIC Number:</x-input-label>
                    <x-text-input id="nic_number" class="block mt-1 w-full" type="text" name="nic_number"
                        :value="$account->nic_number" required />
                </div>

                <div class="flex items-center justify-end">
                    <x-primary-button>
                        {{ __('Update Account') }}
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
</x-app-layout>
