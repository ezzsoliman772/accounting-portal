# Accounting Portal

A comprehensive accounting system built with Laravel. This application is designed to streamline financial management, invoicing, and reporting with a clean and intuitive user interface.

## 🚀 Features

- **User Authentication & Roles:** Secure login system with role-based access control.
- **Client & Vendor Management:** Easily add, edit, and manage customer and supplier data.
- **Invoicing System:** Create, update, print, and track invoices efficiently.
- **Financial Dashboard:** Interactive dashboard displaying real-time statistics, revenues, and expenses.

## 🛠️ Tech Stack

- **Backend:** Laravel (v11.x)
- **Frontend:** Blade Templates, Bootstrap / Tailwind CSS
- **Database:** MySQL
- **Development Environment:** Laravel Herd

## ⚙️ Prerequisites

Before running this project, make sure you have the following installed:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL 

## 💻 Installation & Setup

1. Clone the repository:
   git clone https://github.com/ezzsoliman772/accounting-portal.git
   cd accounting-portal

2. Install PHP dependencies:
   composer install

3. Install and compile frontend dependencies:
   npm install && npm run build

4. Environment Setup:
   cp .env.example .env
   Open the .env file and update your database credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD).

5. Generate application key:
   php artisan key:generate

6. Run database migrations:
   php artisan migrate
  

7. Start the local development server:
   php artisan serve
   The application will be accessible at http://localhost:8000.

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 📞 Contact

Developer: Ezz Soliman
GitHub: https://github.com/ezzsoliman772
