# TickTickDone

## Opis projektu
TickTickDone to aplikacja typu "To-Do List" umożliwiająca użytkownikom zarządzanie swoimi zadaniami. Projekt obejmuje pełną funkcjonalność CRUD, filtrowanie zadań, wysyłanie powiadomień e-mail, obsługę wielu użytkowników oraz dodatkowe funkcje takie jak historia edycji zadań, generowanie publicznych linków do zadań.



## Funkcjonalności

### Podstawowe funkcje
1. **CRUD**
   - Tworzenie, odczyt, edycja i usuwanie zadań.
   - Pola zadań:
     - Nazwa zadania (max 255 znaków, wymagane).
     - Opis (opcjonalne).
     - Priorytet (low/medium/high).
     - Status (to-do, in progress, done).
     - Termin wykonania (data, wymagane).

2. **Filtrowanie**
   - Możliwość filtrowania zadań według priorytetów, statusu i terminu wykonania.

3. **Powiadomienia e-mail**
   - Automatyczne wysyłanie e-maili na 1 dzień przed terminem zadania.
   - Obsługa kolejek i harmonogramu zadań (Scheduler).

4. **Obsługa wielu użytkowników**
   - Każdy użytkownik może zarządzać własnymi zadaniami po zalogowaniu.

### Dodatkowe funkcje
5. **Historia edycji zadań**
   - Zapis każdej zmiany w nazwie, opisie, priorytecie, statusie i terminie zadania.
   - Możliwość przeglądania poprzednich wersji zadania.

6. **Udostępnianie zadań**
   - Generowanie publicznych linków do zadań z tokenem dostępu.
   - Link działa przez określony czas, po czym staje się nieaktywny.



## Instalacja i uruchomienie projektu

### Wymagania wstępne
- PHP 8.1+
- Composer
- MySQL lub SQLite
- Node.js (dla npm)
- Laravel 11

### Kroki instalacji
1. **Sklonuj repozytorium:**
   ```bash
   git clone https://github.com/Dakotha/TickTickDone.git
   cd ticktickdone
   ```

2. **Zainstaluj zależności:**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Utwórz plik `.env` i skonfiguruj połączenie z bazą danych:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Uruchom migracje i seedery:**
   ```bash
   php artisan migrate --seed
   ```

5. **Uruchom aplikację lokalnie:**
   ```bash
   php artisan serve
   ```

6. **Uruchom kolejkowanie zadań:**
   ```bash
   php artisan queue:work
   ```



## Konfiguracja powiadomień e-mail

W pliku `.env` należy skonfigurować dane dostępu do serwera SMTP:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=twoj_login
MAIL_PASSWORD=twoje_haslo
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=twoj_email@example.com
MAIL_FROM_NAME="TickTickDone"
```
