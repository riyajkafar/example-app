<x-app-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Payment') }}
    </h2>
  </x-slot>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

      <!-- form    -->
      <form method="POST" action="{{route('payments.update', $payment->id)}}">
        @method('PUT')
        @csrf

        <!-- Payment By -->
        <div>
          <x-input-label for="payment_by" :value="__('Payment By')" />
          <x-text-input id="payment_by" class="block mt-1 w-full" type="text" name="payment_by" :value="$payment->payment_by" required />

        </div>

        <!-- Payment Date -->
        <div>
          <x-input-label for="payment_date" :value="__('Payment Date')" />
          <x-text-input id="payment_date" class="block mt-1 w-full" type="date" name="payment_date" :value="$payment->payment_date" required />

        </div>

        <!-- amount-->
        <div>
          <x-input-label for="amount" :value="__('Amount')" />
          <x-text-input id="amount" class="block mt-1 w-full" type="text" name="amount" :value="$payment->amount" required />
        </div>

         <!-- Payment method -->
         <div>
                    <x-input-label for="payment_method" :value="__('Payment Method')" />
                    <select id="payment_method" name="payment_method" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="Credit Card" {{$payment->currency == 'Credit Card' ? 'selected' : ''}}>Credit Card</option>
                        <option value="Cash" {{$payment->currency == 'Cash' ? 'selected' : ''}}>Cash</option>
                        <option value="Bank Transfers" {{$payment->currency == 'Bank Transfers' ? 'selected' : ''}}>Bank Transfers</option>
                    </select>
                    <x-input-error :messages="$errors->get('payment_method')" class="mt-2" />
                </div>

            <!-- Payment Currency -->
        
            <div>
                    <x-input-label for="currency" :value="__('Payment currency')" />
                    <select id="currency" name="currency" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="LKR" {{$payment->currency == 'LKR' ? 'selected' : ''}}>LKR</option>
                        <option value="USD" {{$payment->currency == 'USD' ? 'selected' : ''}}>USD</option>
                        <option value="EUR" {{$payment->currency == 'EUR' ? 'selected' : ''}}>EUR</option>
                        <option value="RUB" {{$payment->currency == 'RUB' ? 'selected' : ''}}>RUB</option>
                    </select>
                    <x-input-error :messages="$errors->get('currency')" class="mt-2" />
                </div>

            <!-- Payment Status -->
            <div>
                    <x-input-label for="status" :value="__('Payment status')" />
                    <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="completed" {{$payment->status == 'completed' ? 'selected' : ''}}>completed</option>
                        <option value="pending" {{$payment->status == 'pending' ? 'selected' : ''}}>pending</option>
                        <option value="failed" {{$payment->status == 'failed' ? 'selected' : ''}}>failed</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

       



                <!-- Message  -->
                <div>
          <x-input-label for="description" :value="__('Description')" />
          <x-form-textarea id="description" name="description" rows="4" :value="$payment->description" required class="w-full" />
          <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">
          <x-primary-button class="ms-4">
            {{ __('Update payment') }}
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