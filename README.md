# Hotel Management & Booking System 🏨

A complete hotel reservation platform built with **Laravel** and **Filament PHP**. Guests browse hotels and rooms and book in seconds, while hotel staff manage everything from a powerful, intuitive admin dashboard.

## 🔗 Links

- **Video Demo:** [Watch the demo on Google Drive](https://drive.google.com/file/d/1syiDKYpOX0N5Eb_jfj_lKfCRbI8oKecr/view?usp=sharing)
- **Full Documentation:** [DOCUMENTATION.md](DOCUMENTATION.md)
- **Repository:** [github.com/Aboodbr/Booking_System](https://github.com/Aboodbr/Booking_System)

## 🚀 Key Features

### 🧑‍💻 Guest Experience (Frontend)

- **Seamless booking flow:** fast, user-friendly interface for browsing hotels and reserving rooms.
- **Real-time availability:** accurate room statuses that prevent double bookings.
- **Responsive design:** fully responsive UI built with HTML, CSS, and vanilla JavaScript.
- **Booking confirmation:** guests receive their booking details by email.

### 🛡️ Admin Dashboard (Filament PHP)

- **Insightful dashboard:** revenue, total bookings, and room counts with booking trend charts.
- **Booking management:** view, approve, modify, or cancel customer reservations.
- **Room & hotel control:** manage hotels, rooms, pricing, and availability dynamically.
- **User management:** view and manage registered users.

### ⚙️ System Architecture (Backend)

- **Clean Laravel architecture:** migrations, seeders, Eloquent relationships, and request validation.
- **Optimized performance:** efficient database queries and structured workflows.
- **Robust security:** secure authentication and data handling.
- **Flexible database layer:** MySQL by default, SQLite supported for quick local setup.

## 💻 Tech Stack

- **Backend:** PHP 8.x, Laravel
- **Admin Panel:** Filament PHP
- **Database:** MySQL / SQLite
- **Frontend:** HTML, CSS, JavaScript, Tailwind CSS, Vite

## 🛠️ Installation & Setup

1. **Clone the repository:**

    ```bash
    git clone https://github.com/Aboodbr/Booking_System.git
    cd Booking_System
    ```

2. **Install PHP dependencies:**

    ```bash
    composer install
    ```

3. **Install and build frontend assets:**

    ```bash
    npm install && npm run build
    ```

4. **Set up the environment file:**

    ```bash
    cp .env.example .env
    ```

    Then configure your database credentials in `.env` (MySQL or SQLite).

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run database migrations and seeders:**

    ```bash
    php artisan migrate --seed
    ```

7. **Create a Filament admin user:**

    ```bash
    php artisan make:filament-user
    ```

8. **Start the local development server:**

    ```bash
    php artisan serve
    ```

    The storefront is at `http://127.0.0.1:8000` and the admin panel at `http://127.0.0.1:8000/admin`.

## 📄 Documentation

Full buyer documentation (installation, configuration, admin usage, customization, deployment) is in [DOCUMENTATION.md](DOCUMENTATION.md).

## 📜 License

This project is commercial software. See [LICENSE](LICENSE) for terms.

## 👨‍💻 Author

**Abdelrahman Albetar**

- LinkedIn: [Abdelrahman Albetar](https://www.linkedin.com/in/abdelrahman-albetar-672375318/)
- Email: aboodragon12345@gmail.com
