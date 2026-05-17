# Hotel Management & Booking System 🏨

A comprehensive, scalable hotel reservation platform built with **Laravel** and **Filament PHP**. This system is designed to deliver a fast, seamless booking experience for users while providing a highly efficient and intuitive administrative dashboard for hotel management.

## 🔗 Links

- **Video Demo:** [Watch Demo on Google Drive](https://drive.google.com/file/d/1syiDKYpOX0N5Eb_jfj_lKfCRbI8oKecr/view?usp=sharing)
- **Repository:** [GitHub Link](https://github.com/Aboodbr/Booking_System.git)

## 🚀 Key Features

### 🧑‍💻 User Experience (Frontend)

- **Seamless Booking Flow:** Fast and user-friendly interface for browsing and reserving rooms.
- **Responsive Design:** Fully responsive UI built with HTML, CSS, and Vanilla JavaScript.
- **Real-Time Availability:** Accurate reflection of room statuses to prevent double bookings.

### 🛡️ Admin Dashboard (Filament PHP)

- **Streamlined Operations:** Rapidly developed, robust admin panel utilizing Filament.
- **Booking Management:** Easily view, approve, modify, or cancel customer reservations.
- **Room & Resource Control:** Manage room types, pricing, and availability dynamically.

### ⚙️ System Architecture (Backend)

- **Advanced Laravel Patterns:** Maintainable, structured, and clean code architecture.
- **Optimized Performance:** Efficient database queries and structured workflows to handle traffic smoothly.
- **Robust Security:** Secure data handling and user authentication.

## 💻 Tech Stack

- **Backend:** PHP 8.x, Laravel
- **Admin Panel:** Filament
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript

## 🛠️ Installation & Setup

Follow these steps to run the project locally:

1. **Clone the repository:**
    ```bash
    git clone [https://github.com/Aboodbr/Booking_System.git](https://github.com/Aboodbr/Booking_System.git)
    Navigate to the project directory:
    ```

Bash
cd Booking_System
Install PHP dependencies:

Bash
composer install

4. **Install Frontend dependencies:**
    ```bash
    npm install && npm run build

    ```

Set up the environment file:
Duplicate the .env.example file and rename it to .env, then configure your MySQL database credentials.

Bash
cp .env.example .env

6. **Generate the application key:**
    ```bash
    php artisan key:generate
    Run database migrations and seeders:
    ```

Bash
php artisan migrate --seed
Create a Filament Admin User:

Bash
php artisan make:filament-user

9. **Start the local development server:**
    ```bash
    php artisan serve

    ```

👨‍💻 Author
Abdalrhman Ahmed

LinkedIn: [Abdelrahman Albetar](https://www.linkedin.com/in/abdelrahman-albetar-672375318/)

Email: aboodragon12345@gmail.com
