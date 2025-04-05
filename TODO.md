# TODO.md

📄 [View this file in Polish 🇵🇱](TODO_PL.md)

## Recruitment Task Description

### Task Overview:
Create a **To-Do List** application that allows users to add, edit, view, and delete tasks (CRUD), as well as receive email reminders.

---

### Functional Requirements:

#### ✅ 1. CRUD:
- Full CRUD (Create, Read, Update, Delete) operations on tasks with the following fields:
    - ✅ Task name (max 255 characters, required)
    - ✅ Description (optional)
    - ✅ Priority (low / medium / high)
    - ✅ Status (to-do, in progress, done)
    - ✅ Due date (required)

#### ✅ 2. Task viewing:
- ✅ Filtering task list by priority, status, and due date

#### ✅ 3. Email notifications:
- ✅ Email reminders 1 day before task deadline (Laravel Queues + Scheduler)

#### ✅ 4. Validation:
- ✅ All forms validate input (required fields, formats, character limits, etc.)

#### ✅ 5. Multi-user support:
- ✅ Laravel Breeze authentication
- ✅ Each user can only see and manage their own tasks

#### ✅ 6. Public task sharing via access token:
- ✅ Users can generate a public shareable link with token
- ✅ Link remains valid for 24 hours

---

### Bonus Features (Optional):

#### ✅ 7. Full task edit history:
- ✅ Every change to a task is saved in history
- ✅ A dedicated view to browse past versions

#### ✅ 8. Google Calendar integration:
- ✅ Ability to add tasks to the user's Google Calendar

---

### Technical Requirements:

#### ✅ 1. Back-end:
- ✅ Laravel 11
- ✅ REST API
- ✅ Eloquent ORM
- ✅ Migrations
- ✅ MySQL

#### ✅ 2. Front-end:
- ✅ Laravel Blade
- ✅ Clean and minimal UI

#### ✅ 3. (Optional) Docker setup:
- ✅ Dockerfile + docker-compose.yml
- ✅ Mailhog for email testing

---

### Deliverables:

- ✅ `README.md` with setup and configuration instructions
- ✅ `TODO.md` with the original task description
- ✅ `DONE.md` describing the completed features and thoughts
- ✅ Public GitHub/GitLab repository
