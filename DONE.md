# DONE.md

## Co zostało zrobione

W ramach zadania stworzyłem pełnoprawną aplikację To-Do List w Laravel 11 z obsługą wielu użytkowników, przypomnieniami e-mail, udostępnianiem zadań oraz integracją z Google Calendar. Poniżej szczegółowe informacje o wykonanych funkcjach.

### Wymagania funkcjonalne

1. **CRUD na zadaniach** ✓  
   - Nazwa zadania (max 255 znaków, wymagane) ✓
   - Opis (opcjonalnie) ✓
   - Priorytet: low/medium/high ✓
   - Status: to-do, in progress, done ✓
   - Termin wykonania (data, wymagane) ✓

2. **Przeglądanie zadań z filtrami** ✓
   - Filtrowanie po priorytecie, statusie i dacie ✓

3. **Powiadomienia e-mail** ✓
   - Wysyłka na 1 dzień przed terminem
   - Wykorzystano Scheduler, Queue oraz Mailhog
   - System zapamiętuje, czy powiadomienie zostało wysłane (pole `reminder_sent_at`)

4. **Walidacja** ✓
   - Na poziomie formularzy i kontrolerów (Form Requesty)
   - Błędy wyświetlane na stronie formularza

5. **Obsługa wielu użytkowników** ✓
   - Uwierzytelnianie (breeze, sanctum lub domyślne auth)
   - Każdy użytkownik widzi tylko swoje zadania

6. **Udostępnianie zadania przez link** ✓
   - Link publiczny z tokenem
   - Dostępny przez 24 godziny
   - Widok zadania bez możliwości edycji

---

### Dodatkowe funkcje (bonus)

7. **Historia zmian zadania** ✓
   - Zmiany zapisywane przy edycji (osobna tabela `task_histories`)
   - Wyświetlanie historii zmian oraz aktualnego stanu zadania

8. **Integracja z Google Calendar** ✓
   - Użytkownik może dodać zadanie do kalendarza Google
   - Obsługa autoryzacji i zapisu wydarzenia przez spatie/laravel-google-calendar
   - Start i koniec wydarzenia uwzględnia strefę czasową Europe/Warsaw

---

### Wymagania techniczne

- Laravel 11 ✓
- REST API w niektórych przypadkach ✓
- Eloquent ORM, migracje, relacje ✓
- Prosty interfejs w Blade + Tailwind ✓
- Docker (nginx, php, mariadb, mailhog) ✓

---

### Uwagi i przemyślenia

- Cała aplikacja jest przetestowana lokalnie i działa bezbłędnie.
- Scheduler działa jako osobny proces (`php artisan schedule:work`) w kontenerze.
- Wdrożenie Google Calendar jest nieco problematyczne ze względu na proces autoryzacji i ograniczenia testowe Google, ale działa lokalnie.
- Projekt był rozwijany z myślą o czytelności kodu, rozdzieleniu odpowiedzialności i zgodnie z praktykami Laravel.

---

### Autor
Łukasz Matejka. (contact@phpdeveloper.pl)


