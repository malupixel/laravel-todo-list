<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

class TaskCalendarController extends Controller
{
    use AuthorizesRequests;

    public function addToCalendar(Task $task)
    {
        $this->authorize('update', $task); // tylko właściciel

        $event = new Event;

        $event->name = $task->name;
        $event->description = $task->description ?? '';
        $event->startDateTime = Carbon::parse($task->due_date)->startOfDay();
        $event->endDateTime = Carbon::parse($task->due_date)->endOfDay();

        $event->save();

        return redirect()->route('tasks.show', $task)->with('success', 'Zadanie dodane do kalendarza Google!');
    }
}
