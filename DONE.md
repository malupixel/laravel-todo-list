# DONE.md

📄 [View this file in Polish 🇵🇱](DONE_PL.md)

## What has been done

As part of the task, I created a full-featured To-Do List application in Laravel 11 with multi-user support, email reminders, task sharing, and Google Calendar integration. Below are detailed notes on what was implemented.

### Functional Requirements

1. **CRUD operations on tasks** ✓
    - Task name (max 255 characters, required) ✓
    - Description (optional) ✓
    - Priority: low / medium / high ✓
    - Status: to-do, in progress, done ✓
    - Due date (required) ✓

2. **Task browsing with filters** ✓
    - Filtering by priority, status, and due date ✓

3. **Email notifications** ✓
    - Sent 1 day before due date
    - Uses Laravel Scheduler, Queue, and Mailhog
    - System remembers if a notification was sent (`reminder_sent_at` field)

4. **Validation** ✓
    - At both form and controller level (Form Requests)
    - Validation errors are displayed in the UI

5. **Multi-user support** ✓
    - Authentication (Laravel Breeze or default auth)
    - Each user sees only their own tasks

6. **Task sharing via link** ✓
    - Public link with access token
    - Available for 24 hours
    - Read-only view (no edit access)

---

### Bonus Features

7. **Task edit history** ✓
    - Changes are saved when editing (in a separate `task_histories` table)
    - Displays both edit history and current task state

8. **Google Calendar integration** ✓
    - Users can add a task to their Google Calendar
    - Authorization and event creation handled via `spatie/laravel-google-calendar`
    - Event start and end time includes `Europe/Warsaw` timezone

---

### Technical Requirements

- Laravel 11 ✓
- REST API used where appropriate ✓
- Eloquent ORM, migrations, relationships ✓
- Clean Blade UI with Tailwind CSS ✓
- Docker (nginx, php, mariadb, mailhog) ✓

---

### Notes & Reflections

- The entire app is tested locally and works as expected.
- Scheduler runs as a separate process via `php artisan schedule:work` inside Docker.
- Google Calendar integration can be tricky due to Google’s verification flow but works in testing.
- Project was built with code clarity, responsibility separation, and Laravel best practices in mind.

---

### Author

Łukasz Matejka (contact@phpdeveloper.pl)
