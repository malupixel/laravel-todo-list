<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TaskReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Przypomnienie: Zadanie zbliża się do terminu')
            ->greeting("Cześć, {$notifiable->name}!")
            ->line("Zadanie **{$this->task->name}** ma termin: {$this->task->due_date->format('Y-m-d')}.")
            ->line("Nie zapomnij go dokończyć! 💪")
            ->action('Zobacz zadanie', route('tasks.show', $this->task->id))
            ->line('— Twój TODO App');
    }
}
