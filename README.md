[🇵🇱 Kliknij tutaj, aby przeczytać wersję po polsku](./README_PL.md)

# To-Do List (Laravel 11)

A simple task management app built with Laravel 11.  
It supports full task CRUD, filtering, public sharing, email reminders, and Google Calendar integration.

---

## Requirements

- PHP 8.3+
- Composer
- Docker + Docker Compose

---

## Getting Started (Docker)

1. **Clone the repository:**

   ```bash
   git clone https://github.com/malupixel/laravel-todo-list.git
   cd laravel-todo-list
   ```

2. **Copy `.env.example` and adjust it if needed:**

   ```bash
   cp .env.example .env
   ```

3. **Start Docker containers:**

   ```bash
   docker-compose up -d --build
   ```

4. **Install dependencies and run migrations:**

   ```bash
   docker exec -it todo_app bash
   composer install
   php artisan migrate
   php artisan db:seed
   ```

5. **Run Vite (for live reload):**

   In a separate terminal:

   ```bash
   docker exec -it todo_app bash
   npm install
   npm run dev -- --host 0.0.0.0
   ```

6. **Access the app:**

   - App: [http://localhost:8000](http://localhost:8000)
   - MailHog (email preview): [http://localhost:8026](http://localhost:8026)

---

## Cron / Scheduled Tasks

To enable email reminders:

```bash
php artisan schedule:work
```

For production, add a cron entry:

```cron
* * * * * cd /path/to/project && php artisan schedule:run >> /dev/null 2>&1
```

---

## Google Calendar Integration

1. Set up Google API credentials and save the file as:  
   `storage/app/google-calendar/credentials.json`

2. Run authorization process:

   ```bash
   php calendar-auth.php
   ```

3. After login, you’ll be able to add tasks to Google Calendar.

---

## User Registration

By default, no users are created automatically.  
Register manually using the `/register` form to start using the app.

---

## Author

Project completed as part of a recruitment assignment.

Repository: [https://github.com/malupixel/laravel-todo-list](https://github.com/malupixel/laravel-todo-list)
