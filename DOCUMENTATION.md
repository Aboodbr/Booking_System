# Hotel Management & Booking System — Documentation

Thank you for purchasing the Hotel Management & Booking System. This document covers installation, configuration, everyday admin usage, customization, and deployment. If you get stuck, contact the author (see Support at the end).

---

## 1. Requirements

- **PHP** 8.1 or newer (8.2+ recommended) with the usual Laravel extensions (OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, JSON, BCMath, Fileinfo)
- **Composer** 2.x
- **Node.js** 18+ and npm
- **MySQL** 8+ (or SQLite for a quick local/demo setup)
- A web server (Apache/Nginx) for production, or `php artisan serve` locally

## 2. Installation

```bash
# 1. Unzip the package (or clone your copy) and enter the folder
cd Booking_System

# 2. Install PHP dependencies
composer install

# 3. Install and build frontend assets
npm install && npm run build

# 4. Create your environment file
cp .env.example .env

# 5. Generate the application key
php artisan key:generate

# 6. Run migrations and seeders (creates tables + sample data)
php artisan migrate --seed

# 7. Create your admin account
php artisan make:filament-user

# 8. Start the app (local)
php artisan serve
```

- Storefront: `http://127.0.0.1:8000`
- Admin panel: `http://127.0.0.1:8000/admin`

## 3. Configuration (.env)

All configuration lives in the `.env` file in the project root.

### Application

```env
APP_NAME="Damas Hotel"
APP_URL=http://127.0.0.1:8000
```

Set `APP_NAME` to your hotel's brand name and `APP_URL` to your domain in production.

### Database

MySQL (default for production):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_booking
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

SQLite (quickest start):

```env
DB_CONNECTION=sqlite
```

Then create the file `database/database.sqlite` before migrating.

### Mail (booking confirmation emails)

The system emails guests their booking details. Configure any SMTP provider:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourprovider.com
MAIL_PORT=587
MAIL_USERNAME=your_smtp_user
MAIL_PASSWORD=your_smtp_password
MAIL_FROM_ADDRESS="bookings@yourhotel.com"
MAIL_FROM_NAME="${APP_NAME}"
```

For local testing, `MAIL_MAILER=log` writes emails to `storage/logs/laravel.log` instead of sending.

## 4. Admin Guide

Log in at `/admin` with the account created by `php artisan make:filament-user`.

### Dashboard

The landing page shows total revenue (from confirmed bookings), total bookings, total rooms, and a bookings trend chart for the current year.

### Hotels

Create and manage the hotels in your portfolio: name, description, images, and contact details shown on the storefront.

### Rooms

For each hotel, manage rooms: room type/name, price per night, capacity (persons, beds), size, facilities, images, and availability status. A room marked unavailable cannot be booked, which prevents double bookings.

### Bookings

Every guest booking appears here with guest details, room, dates, and status.

- **Pending** — new booking awaiting your decision.
- **Confirmed** — approved; counts toward revenue on the dashboard.
- **Cancelled** — rejected or cancelled; frees the room for the dates.

Open a booking to approve, modify, or cancel it.

### Users

View and manage registered guest accounts.

## 5. Guest Guide (Storefront)

1. Guests register or log in from the top navigation.
2. They browse hotels and rooms, with prices, capacity, and facilities.
3. "Book Now" opens the booking form (dates, contact details).
4. After booking, the guest receives a confirmation email with the details.
5. The booking stays pending until an admin confirms it in the dashboard.

## 6. Customization

- **Branding:** the default brand is "Damas Hotel". Update `APP_NAME`, the logo, and the header/footer contact details in `resources/views` (layout partials).
- **Currency & prices:** prices are set per room in the admin panel.
- **Room images:** upload via the admin panel; images are stored under `public/Rooms/images`.
- **Email content:** booking emails are standard Laravel notifications/mailables under `app/` — adjust the templates to your tone and language.

## 7. Deployment (Production)

1. Point your web server's document root to the project's `public/` directory.
2. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
3. Set `APP_URL` to your domain and configure HTTPS.
4. Run:

    ```bash
    composer install --optimize-autoloader --no-dev
    npm install && npm run build
    php artisan key:generate
    php artisan migrate --force
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

5. Create the first admin with `php artisan make:filament-user`.
6. Make sure `storage/` and `bootstrap/cache/` are writable by the web server.

## 8. Support

- **Author:** Abdelrahman Albetar
- **Email:** aboodragon12345@gmail.com
- **Video walkthrough:** [Google Drive demo](https://drive.google.com/file/d/1syiDKYpOX0N5Eb_jfj_lKfCRbI8oKecr/view?usp=sharing)

When contacting support, include your purchase date and a description (or screenshot) of the issue.
