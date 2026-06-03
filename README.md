# Student Registration System

A premium university-style student registration platform built with Laravel, PHP 8+, Tailwind CSS, and JavaScript featuring a purple & white liquid glass (glassmorphism) UI.

## Features

- **Authentication**: Login, Register, Logout, Forgot Password, Reset Password
- **Role-Based Access Control**: Admin and Guest/User roles with policies
- **Student CRUD**: Create, read, update, delete with photo uploads
- **Search & Sort**: Search by ID, name, email, phone; sortable columns; pagination
- **Dashboard**: Statistics, growth chart, recent registrations, quick actions
- **User Management**: Admin-only user and role management
- **Security**: CSRF protection, form validation, authorization policies, secure uploads

## Default User Accounts

These accounts are created automatically when you run `php artisan migrate --seed`:

| Role  | Name   | Email              | Password   |
|-------|--------|--------------------|------------|
| Admin | Sumaya | sumaya@gmail.com   | sumaya123  |
| Guest | Aabo   | aabo@gmail.com     | 1234567    |

**Admin (Sumaya)** — Full access: create, edit, delete students, upload photos, manage users, view dashboard statistics.

**Guest (Aabo)** — View student list, search students, and view student details only.

## Localization (Somaliland)

This system is configured for **Hargeisa, Somaliland**:

- **Interface language**: English
- **Sample students**: 22 realistic Somali names (e.g. Ahmed Mohamed, Ayan Hassan, Hodan Yusuf)
- **Addresses**: Hargeisa districts (Jigjiga Yar, New Hargeisa, Mohamed Mooge, October, Isha Boorama, and more)
- **Phone numbers**: Somaliland format (`+252 63 XXXXXXX`, `+252 65 XXXXXXX`)
- **Currency reference**: Somaliland Shilling (SLSH) — for future fee/payment features

Student records are seeded via `StudentSeeder` when you run `php artisan migrate --seed`.

## Requirements

- PHP 8.3+
- Composer
- Node.js & npm
- MySQL (production) or SQLite (local default)

## Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install
npm run build
```

### MySQL Configuration

Update `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student
DB_USERNAME=root
DB_PASSWORD=
```

Create the database, then run migrations:

```bash
php artisan migrate:fresh --seed
```

## Development

```bash
composer dev
```

Or visit via [Laravel Herd](https://herd.laravel.com): `http://student.test`

## Architecture

- **MVC** with RESTful controllers
- **Service Layer**: `StudentService`, `DashboardService`, `UserService`
- **Form Requests**: Validation for students and users
- **Policies**: `StudentPolicy`, `UserPolicy`
- **Middleware**: `admin` for user management routes

## Pages

1. Landing Page (`/`)
2. Login (`/login`)
3. Register (`/register`)
4. Dashboard (`/dashboard`)
5. Students List (`/students`)
6. Add Student (`/students/create`) — Admin only
7. Edit Student (`/students/{id}/edit`) — Admin only
8. Student Details (`/students/{id}`)
9. User Management (`/users`) — Admin only
10. Profile (`/profile`)

## Permissions

| Action              | Admin | Guest |
|---------------------|-------|-------|
| View Students       | Yes   | Yes   |
| Search Students     | Yes   | Yes   |
| View Student Detail | Yes   | Yes   |
| Create Student      | Yes   | No    |
| Edit Student        | Yes   | No    |
| Delete Student      | Yes   | No    |
| Dashboard Stats     | Yes   | Yes   |
| Manage Users        | Yes   | No    |
| Upload Photos       | Yes   | No    |
