<h1>Przypomnienie o zadaniu</h1>
<p><strong>{{ $task->name }}</strong></p>

@if (!empty($task->description))
    <p>{{ $task->description }}</p>
@endif

<p>Termin: <strong>{{ \Illuminate\Support\Carbon::parse($task->due_date)->format('Y-m-d') }}</strong></p>
