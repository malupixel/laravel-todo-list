<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskCalendarController;
use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/tasks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::post('/tasks/{task}/share', [TaskController::class, 'generateShareLink'])->name('tasks.share');
    Route::get('/tasks/{task}/history', [TaskController::class, 'history'])->name('tasks.history');
    Route::post('/tasks/{task}/calendar', [TaskCalendarController::class, 'addToCalendar'])->name('tasks.calendar.add');


});

Route::get('/shared/{token}', function (string $token) {
    $task = \App\Models\Task::where('share_token', $token)->firstOrFail();

    if (! $task->share_expires_at || $task->share_expires_at->isPast()) {
        abort(403, 'Link wygasł lub jest nieaktywny.');
    }

    return view('tasks.show', ['task' => $task, 'showBack' => false]);
})->name('tasks.shared');

require __DIR__.'/auth.php';
