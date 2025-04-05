@extends('layouts.base')

@section('content')
    <div class="max-w-xl mx-auto py-10">
        <h1 class="text-2xl font-semibold mb-6">Add New Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf

            @include('tasks.partials.form', ['task' => null])

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Create Task
            </button>
        </form>
    </div>
@endsection
