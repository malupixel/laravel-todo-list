@extends('layouts.base')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Podgląd zadania</h1>

        <div class="border p-4 rounded mb-4">
            <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
            @if (!empty($task->description))
                <p class="text-sm text-gray-600 mb-2">{{ $task->description }}</p>
            @endif

            <div class="text-sm text-gray-500">
                <strong>Priorytet:</strong> {{ ucfirst($task->priority) }}<br>
                <strong>Status:</strong> {{ ucfirst($task->status) }}<br>
                <strong>Termin:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}
                @auth
                <form action="{{ route('tasks.share', $task) }}" method="POST">
                    @csrf
                    <button class="text-blue-600 hover:underline" type="submit">Udostępnij zadanie</button>
                </form>

                @if ($task->share_token && $task->share_expires_at->isFuture())
                    <div class="text-sm mt-2">
                        <span class="text-gray-600">Dostępne do:</span>
                        <strong>{{ $task->share_expires_at->format('Y-m-d H:i') }}</strong><br>
                        <a href="{{ route('tasks.shared', $task->share_token) }}" class="text-blue-500 underline" target="_blank">
                            {{ route('tasks.shared', $task->share_token) }}
                        </a>
                    </div>
                @endif
                @endauth
            </div>
        </div>

        @if ($showBack ?? false)
            <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">← Powrót do listy</a>
        @endif
        <a href="{{ route('tasks.history', $task) }}" class="text-blue-600 hover:underline">🕘 Zobacz historię zmian</a>
        @if (auth()->check())
            <form action="{{ route('tasks.calendar.add', $task) }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="text-green-600 hover:underline">Dodaj do Google Calendar</button>
            </form>
        @endif
    </div>
@endsection
