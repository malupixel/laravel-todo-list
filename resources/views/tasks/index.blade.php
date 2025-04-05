@extends('layouts.base')

@section('content')
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-2xl font-semibold mb-6">My Tasks</h1>

        <div class="mb-6">
            <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Add New Task
            </a>
        </div>

        <!-- Filter form -->
        <form method="GET" class="mb-6 flex gap-4 flex-wrap">
            <select name="priority" class="border rounded px-2 py-1">
                <option value="">All Priorities</option>
                <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
                <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
            </select>

            <select name="status" class="border rounded px-2 py-1">
                <option value="">All Statuses</option>
                <option value="to-do" {{ request('status') === 'to-do' ? 'selected' : '' }}>To-do</option>
                <option value="in progress" {{ request('status') === 'in progress' ? 'selected' : '' }}>In progress</option>
                <option value="done" {{ request('status') === 'done' ? 'selected' : '' }}>Done</option>
            </select>

            <input type="date" name="due_date" value="{{ request('due_date') }}" class="border rounded px-2 py-1" />

            <button type="submit" class="bg-gray-200 px-3 py-1 rounded">Filter</button>
        </form>

        <!-- Task list -->
        @if($tasks->count())
            <div class="space-y-4">
                @foreach($tasks as $task)
                    <div class="p-4 border rounded flex justify-between items-center bg-white shadow-sm">
                        <div>
                            <h2 class="text-lg font-semibold"><a href="{{ route('tasks.show', $task) }}">{{ $task->name }}</a></h2>
                            <p class="text-sm text-gray-600">{{ $task->description }}</p>
                            <div class="text-xs mt-1 text-gray-500">
                                Priority: <strong>{{ ucfirst($task->priority) }}</strong>,
                                Status: <strong>{{ ucfirst($task->status) }}</strong>,
                                Due: <strong>{{ $task->due_date->format('Y-m-d') }}</strong>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:underline">Show</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $tasks->links() }}
            </div>
        @else
            <p>No tasks found.</p>
        @endif
    </div>
@endsection
