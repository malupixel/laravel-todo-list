# TODO.md

## Treść zadania rekrutacyjnego

### Opis zadania:
Stwórz aplikację "To-Do list", która umożliwia użytkownikowi dodawanie, edytowanie, przeglądanie i usuwanie zadań (CRUD) oraz wysyłanie powiadomień e-mail.

---

### Wymagania funkcjonalne:

#### ✅ 1. CRUD:
- Pełne operacje CRUD (Create, Read, Update, Delete) na zadaniach, z następującymi polami:
    - ✅ Nazwa zadania (max 255 znaków, wymagane)
    - ✅ Opis (opcjonalnie)
    - ✅ Priorytet (low/medium/high)
    - ✅ Status (to-do, in progress, done)
    - ✅ Termin wykonania (data, wymagane)

#### ✅ 2. Przeglądanie zadań:
- ✅ Filtrowanie listy zadań według priorytetów, statusu i terminu.

#### ✅ 3. Powiadomienia e-mail:
- ✅ Powiadomienie e-mail na 1 dzień przed terminem zadania (Laravel Queues + Scheduler).

#### ✅ 4. Walidacja:
- ✅ Wszystkie formularze walidują dane (wymagane pola, formaty, długości tekstów itd.).

#### ✅ 5. Obsługa wielu użytkowników:
- ✅ Uwierzytelnianie Laravel Breeze.
- ✅ Każdy użytkownik widzi tylko swoje zadania.

#### ✅ 6. Udostępnianie zadań bez autoryzacji za pomocą linka z tokenem dostępowym:
- ✅ Możliwość wygenerowania publicznego linku z tokenem.
- ✅ Link działa przez 24h.

---

### Dodatkowe funkcje (opcjonalne):

#### ✅ 7. Pełna historia edycji notatek:
- ✅ Zapisywanie każdej zmiany w zadaniu.
- ✅ Widok historii.

#### ✅ 8. Integracja z Google Calendar:
- ✅ Możliwość dodania zadania do kalendarza użytkownika.

---

### Wymagania techniczne:

#### ✅ 1. Back-end:
- ✅ Laravel 11
- ✅ REST API
- ✅ Eloquent ORM
- ✅ Migracje
- ✅ MySQL

#### ✅ 2. Front-end:
- ✅ Laravel Blade
- ✅ Prosty, estetyczny interfejs

#### ✅ 3. (Opcjonalnie) Konfiguracja w Dockerze:
- ✅ Dockerfile + docker-compose.yml
- ✅ Mailhog do testowania maili

---

### Do przekazania:
- ✅ `README.md` z instrukcją uruchomienia i konfiguracji
- ✅ `TODO.md` z treścią zadania
- ✅ `DONE.md` z opisem wykonania i przemyśleniami
- ✅ Repozytorium publiczne GitHub/GitLab
