<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\GoogleCalendar\Event;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id());

        // Filtrowanie
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        $tasks = $query->latest()->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.show', ['task' => $task, 'showBack' => true]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $validated['user_id'] = Auth::id();
        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        $this->authorizeTask($task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorizeTask($task);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to-do,in progress,done',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        TaskHistory::create([
            'task_id'    => $task->id,
            'user_id'    => auth()->id(),
            'name'       => $task->name,
            'description'=> $task->description,
            'priority'   => $task->priority,
            'status'     => $task->status,
            'due_date'   => $task->due_date,
            'created_at' => now(),
        ]);


        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function history(Task $task)
    {
        $this->authorizeTask($task);

        $histories = $task->histories()->with('user')->orderByDesc('created_at')->get();

        return view('tasks.history', compact('task', 'histories'));
    }


    public function destroy(Task $task)
    {
        $this->authorizeTask($task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }

    private function authorizeTask(Task $task)
    {
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
    }

    public function generateShareLink(Task $task)
    {
        $this->authorizeTask($task);

        $task->update([
            'share_token' => Str::uuid(),
            'share_expires_at' => Carbon::now()->addDay(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Link udostępniania wygenerowany.');
    }
}
