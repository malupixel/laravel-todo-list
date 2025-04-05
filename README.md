# To-Do List (Laravel 11)

Aplikacja umożliwia tworzenie i zarządzanie zadaniami (CRUD), filtrowanie, udostępnianie zadań publicznie, wysyłanie przypomnień e-mail oraz integrację z Google Kalendarzem.

---

## Wymagania

- PHP 8.3+
- Composer
- Docker + Docker Compose

---

## Uruchomienie projektu (Docker)

1. **Sklonuj repozytorium:**

   ```bash
   git clone https://github.com/twoje-repozytorium/todo-list.git
   cd todo-list
   ```

2. **Skopiuj plik **``** i dostosuj w razie potrzeby:**

   ```bash
   cp .env.example .env
   ```

3. **Uruchom kontenery Dockera:**

   ```bash
   docker-compose up -d --build
   ```

4. **Zainstaluj zależności i przeprowadź migracje:**

   ```bash
   docker exec -it todo_php bash
   composer install
   php artisan migrate
   php artisan db:seed
   ```

5. **Uruchom Vite (jeśli chcesz korzystać z live reload):**

   W osobnym terminalu:

   ```bash
   docker exec -it todo_php bash
   npm install
   npm run dev -- --host 0.0.0.0
   ```

6. **Dostęp do aplikacji:**

    - Aplikacja: [http://localhost:8000](http://localhost:8000)
    - MailHog (podgląd e-maili): [http://localhost:8026](http://localhost:8026)

---

## Zadania cron / schedule

Aby działały przypomnienia e-mail:

```bash
php artisan schedule:work
```

Możesz dodać wpis cron na serwerze produkcyjnym:

```cron
* * * * * cd /sciezka/do/projektu && php artisan schedule:run >> /dev/null 2>&1
```

---

## Google Calendar

1. Skonfiguruj dane API Google i zapisz jako `storage/app/google-calendar/credentials.json`

2. Uruchom autoryzację:

   ```bash
   php calendar-auth.php
   ```

3. Po zalogowaniu możesz dodawać zadania do kalendarza.

---

## Przed zalogowaniem

Podczas uruchomienia aplikacji nie są tworzone żadne konta użytkowników automatycznie.
Zarejestruj się przez formularz rejestracji (/register), aby rozpocząć korzystanie z aplikacji.


---

## Autor

Projekt zrealizowany w ramach zadania rekrutacyjnego.

Repozytorium: [https://github.com/twoje-repozytorium/todo-list](https://github.com/twoje-repozytorium/todo-list)

