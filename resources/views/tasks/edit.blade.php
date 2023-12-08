<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <div class="flex items-center justify-center h-screen">
        <form action="{{ route('tasks.update', $task) }}" method="POST" class="max-w-md w-full">
            @csrf
            @method('PUT')

            <h1 class="text-3xl font-bold mb-4 text-center">Edit Task</h1>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" name="title" value="{{ $task->title }}" required
                       class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea name="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full">{{ $task->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="added_date" class="block text-sm font-medium text-gray-600">Added Date:</label>
                <input type="text" name="added_date" value="{{ $task->added_date }}" readonly
                       class="mt-1 p-2 border border-gray-300 rounded-md w-full bg-gray-100">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-600">Status:</label>
                <select name="status" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    <option value="Not Started" {{ $task->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                    <option value="Doing" {{ $task->status == 'Doing' ? 'selected' : '' }}>Doing</option>
                    <option value="Finished" {{ $task->status == 'Finished' ? 'selected' : '' }}>Finished</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md w-full">Update Task</button>
        </form>
    </div>
</div>
</div>
</div>
</div>
</x-app-layout>


