# Kontrola Pristupa Objekatu

Laravel aplikacija za evidenciju i kontrolu pristupa objektima, koristeći Laravel-inertia za frontend i različite metode autentifikacije (bar kod, RFID/NFC) za registraciju dolazaka i odlazaka zaposlenih.

## Tehnologije
- **Backend:** Laravel 10
- **Frontend:** React.js
- **Baza podataka:** MySQL
- **Autentifikacija:** Laravel Sanctum
- **Hardverska podrška:** Bar kod skeneri, RFID/NFC čitači

## Instalacija

1. Klonirajte repozitorijum:
   ```bash
   git clone https://github.com/gruyya/access-log-backend.git
   cd access-log-backend
   ```

2. Instalirajte zavisnosti:
   ```bash
   composer install
   npm install
   ```

3. Kreirajte **.env** fajl i konfigurišite bazu podataka:
   ```bash
   cp .env.example .env
   ```

4. Generišite aplikacioni ključ:
   ```bash
   php artisan key:generate
   ```

5. Pokrenite migracije i inicijalne podatke:
   ```bash
   php artisan migrate --seed
   ```

6. Pokrenite aplikaciju:
   ```bash
   php artisan serve
   npm run dev
   ```

## API Endpoints
- `POST /employee-access-log` – Registracija dolaska zaposlenog
- `POST /login` – Login administratora


## Administracija
- Dodavanje i upravljanje zaposlenima
- Prikaz istorije dolazaka i odlazaka
- Generisanje izveštaja

## Autor
[Nenad Grujić](https://github.com/gruyya)

## Licenca
MIT License
