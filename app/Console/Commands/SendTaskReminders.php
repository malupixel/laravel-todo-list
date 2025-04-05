<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Notifications\TaskReminderNotification;
use Carbon\Carbon;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Wyślij przypomnienia e-mail o zadaniach na dzień przed terminem';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->startOfDay();

        Task::whereDate('due_date', $tomorrow)
            ->whereNull('reminder_sent_at')
            ->where('status', '!=', 'done')
            ->with('user')
            ->get()
            ->each(function ($task) {
                if ($task->user) {
                    $task->user->notify(new TaskReminderNotification($task));

                    $task->update([
                        'reminder_sent_at' => now(),
                    ]);
                }
            });

        $this->info('Przypomnienia zostały wysłane.');
    }
}
