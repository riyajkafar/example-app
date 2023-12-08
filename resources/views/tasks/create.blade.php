<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


    <div class="flex items-center justify-center h-screen">
        <form action="{{ route('tasks.store') }}" method="POST" class="max-w-md w-full">
            @csrf

            <h1 class="text-3xl font-bold mb-4 text-center">Create Task</h1>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" name="title" required
                       class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea name="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full"></textarea>
            </div>

            <div class="mb-4">
                <label for="added_date" class="block text-sm font-medium text-gray-600">Added Date:</label>
                <input type="text" name="added_date" value="{{ now() }}" readonly
                       class="mt-1 p-2 border border-gray-300 rounded-md w-full bg-gray-100">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-600">Status:</label>
                <select name="status" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    <option value="Not Started">Not Started</option>
                    <option value="Doing">Doing</option>
                    <option value="Finished">Finished</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Add Task</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>
