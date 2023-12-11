<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Task') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Form -->
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <!-- Task Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Task Description -->
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Added Date -->
                <div>
                    <x-input-label for="added_date" :value="__('Added Date')" />
                    <x-text-input id="added_date" class="block mt-1 w-full" type="text" name="added_date"
                        value="{{ now() }}" readonly />
                    <!-- You might want to change the type to 'hidden' if you don't want users to see this -->
                    <x-input-error :messages="$errors->get('added_date')" class="mt-2" />
                </div>

                <!-- Deadline Date -->
                <div>
                    <x-input-label for="deadline_date" :value="__('Deadline Date')" />
                    <x-text-input id="deadline_date" class="block mt-1 w-full" type="date" name="deadline_date"
                        required />
                    <x-input-error :messages="$errors->get('deadline_date')" class="mt-2" />
                </div>

                <!-- Status -->
                <div>
                    <x-input-label for="status" :value="__('Status')" />
                    <select id="status" name="status" class="block mt-1 w-full border-gray-300 rounded-md"">
                        <option value="Not Started">Not Started</option>
                        <option value="Doing">Doing</option>
                        <option value="Finished">Finished</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Add Task') }}
                    </x-primary-button>

                </div>
                <div class="text-center">
                    <x-nav-link href="{{ route('tasks.index') }}">
                        Back to task List
                    </x-nav-link>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
