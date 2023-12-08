<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h1 class="text-3xl font-bold mb-4">Add Tasks To Do...</h1>

        <ul class="space-y-4">
            @foreach($tasks as $task)
                <li class="bg-white p-4 shadow-md rounded-md">
                    <div class="mb-2">
                        <strong>{{ $task->title }}</strong> - {{ $task->status }}
                    </div>
                    <div class="mb-2">{{ $task->description }}</div>
                    <div class="mb-2">Added on: {{ date('Y-m-d H:i:s', strtotime($task->added_date)) }}</div>

                    <div class="flex space-x-2">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>
                        
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <a href="{{ route('tasks.create') }}" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md">Add Task</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





