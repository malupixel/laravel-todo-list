@extends('layouts.base')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-semibold mb-6">Edit Task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            @include('tasks.partials.form', ['task' => $task])

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save Changes
            </button>
        </form>
    </div>
@endsection
