@extends('layouts.base')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Historia zmian: {{ $task->name }}</h1>

        {{-- 🔹 Aktualny stan zadania --}}
        <div class="bg-green-50 border border-green-200 p-4 rounded mb-6">
            <h2 class="text-lg font-semibold mb-2">Aktualny stan zadania:</h2>
            <ul class="text-sm text-gray-700">
                <li><strong>Nazwa:</strong> {{ $task->name }}</li>
                @if (!empty($task->description))
                    <li><strong>Opis:</strong> {{ $task->description }}</li>
                @endif
                <li><strong>Priorytet:</strong> {{ ucfirst($task->priority) }}</li>
                <li><strong>Status:</strong> {{ ucfirst($task->status) }}</li>
                <li><strong>Termin:</strong> {{ $task->due_date->format('Y-m-d') }}</li>
            </ul>
        </div>

        {{-- 🔹 Historia zmian --}}
        @if ($histories->isEmpty())
            <p class="text-gray-600">Brak zapisanej historii zmian dla tego zadania.</p>
        @else
            <ul class="space-y-4">
                @foreach ($histories as $history)
                    <li class="border p-4 rounded bg-gray-50">
                        <div class="text-sm text-gray-500 mb-2">
                            Zmienione przez:
                            <strong>{{ $history->user?->name ?? 'Nieznany użytkownik' }}</strong>
                            <span class="mx-1">•</span>
                            {{ $history->created_at->format('Y-m-d H:i') }}
                        </div>

                        <div class="text-gray-800">
                            <p><strong>Nazwa:</strong> {{ $history->name }}</p>
                            @if ($history->description)
                                <p><strong>Opis:</strong> {{ $history->description }}</p>
                            @endif
                            <p><strong>Priorytet:</strong> {{ ucfirst($history->priority) }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($history->status) }}</p>
                            <p><strong>Termin:</strong> {{ \Carbon\Carbon::parse($history->due_date)->format('Y-m-d') }}</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="mt-6">
            <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:underline">← Powrót do zadania</a>
        </div>
    </div>
@endsection
