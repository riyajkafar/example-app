<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tasks') }}
        </h2>
    </x-slot>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <form action="{{ route('tasks.update', $task) }}" method="POST" class="w-full">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="title">Title:</x-input-label>
                    <x-text-input type="text" name="title" :value="$task->title" class="block mt-1 w-full">
                    </x-text-input>
                </div>


                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <x-form-textarea id="description" name="description" rows="4" :value="$task->description" required
                        class="w-full" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>




                <div>
                    <x-input-label for="added_date">Added Date:</x-input-label>
                    <x-text-input type="text" name="added_date" :value="$task->added_date" class="block mt-1 w-full">
                    </x-text-input>
                </div>

                <div>
                    <x-input-label for="deadline_date">Deadline Date:</x-input-label>
                    <x-text-input type="date" name="deadline_date" :value="$task->deadline_date" class="block mt-1 w-full">
                    </x-text-input>
                </div>

                <div>
                    <label for="status">Status:</label>
                    <select name="status" class="block mt-1 w-full border-gray-300 rounded-md">
                        <option value="Not Started" {{ $task->status == 'Not Started' ? 'selected' : '' }}>Not Started
                        </option>
                        <option value="Doing" {{ $task->status == 'Doing' ? 'selected' : '' }}>Doing</option>
                        <option value="Finished" {{ $task->status == 'Finished' ? 'selected' : '' }}>Finished</option>
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Update Task') }}
                    </x-primary-button>
                </div>
                <div class="text-center">
                    <x-nav-link href="{{ route('tasks.index') }}">
                        Back to task List
                    </x-nav-link>
                </div>
            </form>
        </div>
</x-app-layout>
