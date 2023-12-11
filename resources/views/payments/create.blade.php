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

          <!-- form    -->
          <form method="POST" action="{{route('payments.store')}}">
            @csrf

            <!-- Payment By -->
            <div>
              <x-input-label for="payment_by" :value="__('Payment By')" />
              <x-text-input id="payment_by" class="block mt-1 w-full" type="text" name="payment_by" required />
              <x-input-error :messages="$errors->get('payment_by')" class="mt-2" />
            </div>

            <!-- Payment Date -->
            <div>
              <x-input-label for="payment_date" :value="__('Payment Date')" />
              <x-text-input id="payment_date" class="block mt-1 w-full" type="date" name="payment_date" required />
              <x-input-error :messages="$errors->get('payment')" class="mt-2" />
            </div>

            <!-- amount-->
            <div>
              <x-input-label for="amount" :value="__('Amount')" />
              <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" required />
              <x-input-error :messages="$errors->get('amount')" class="mt-2" />
            </div>

            <!-- Payment method -->
            <div>
                    <x-input-label for="payment_method" :value="__('Payment Method')" />
                    <select id="payment_method" name="payment_method" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="Credit Card">Credit Card</option>
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfers">Bank Transfers</option>
                    </select>
                    <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                </div>

            <!-- Payment Currency -->
        
            <div>
                    <x-input-label for="currency" :value="__('Payment currency')" />
                    <select id="currency" name="currency" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="LKR">LKR</option>
                        <option value="USD">USD</option>
                        <option value="EUR">EUR</option>
                        <option value="RUB">RUB</option>
                    </select>
                    <x-input-error :messages="$errors->get('currency')" class="mt-2" />
                </div>

            <!-- Payment Status -->
            <div>
                    <x-input-label for="status" :value="__('Payment status')" />
                    <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="completed">completed</option>
                        <option value="pending">pending</option>
                        <option value="failed">failed</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

            <!-- Message  -->
            <div>
              <x-input-label for="description" :value="__('Description')" />
              <x-form-textarea id="description" name="description" rows="4" :value="old('description')" required class="w-full" />
              <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ms-4">
                {{ __('Add New payment') }}
              </x-primary-button>
            </div>
            <div class="text-center">
              <x-nav-link href="{{ route('payments.index') }}">
                Back to Payments List
              </x-nav-link>
            </div>
          </form>
        </div>
      </div>
</x-app-layout>