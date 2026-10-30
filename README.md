# Lab Activity 9 – Barangay Bakuna Tracker

Full-Stack Web Development &bull; Ateneo de Davao University

A Laravel 12 application for Nurse Marites Abellana at Barangay Matina Crossing Health Center, rebuilt with Blade components, layouts, SQLite database seeding, and Tailwind CSS v3 via PostCSS and Vite.

---

## Seeded Login Credentials

| Role | Email | Password |
|---|---|---|
| Health Worker / Nurse | `nurse.hisuan@bakuna.test` | `bakuna2026` |

---

## How to Run the Project

### 1. Clone the repository and navigate into the folder
```bash
git clone <your-repo-url> LabActivity9-Hisu-an
cd LabActivity9-Hisu-an
```

### 2. Install PHP and Node dependencies
```bash
composer install
npm install
```

### 3. Setup environment and database
Ensure your `.env` contains:
```env
DB_CONNECTION=sqlite
```
Run fresh migrations with seeded data:
```bash
php artisan migrate:fresh --seed
```

### 4. Build assets
```bash
npm run build
```
*(Or keep Vite running in development mode using `npm run dev`)*

### 5. Start the local server
```bash
php artisan serve
```
Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## Features & Implemented Requirements

- **Personalization**:
  - Dashboard Title: `Bakuna Tracker – Purok Hisu-an`
  - Seeded Health Worker: `Nurse Hisu-an` (`nurse.hisuan@bakuna.test`)
  - Birthday Record: Seeded resident appointment in 2026
  - Required Vaccines included: BCG, Pentavalent, OPV, MMR, Anti-Flu, and Hepatitis B
- **Blade Layouts & Directives**:
  - Master layout at `resources/views/layouts/app.blade.php` with `@yield('title')` and `@yield('content')`.
  - Conditional alert banners using `@if`, `@elseif`, `@else`, and `@unless`.
  - Schedule tables iterated with `@forelse` ... `@empty` and `$loop` utilities (e.g. `$loop->odd` zebra striping and `$loop->iteration`).
- **Reusable Blade Components**:
  - `<x-stat-card :title="..." :value="..." />` for key vaccination statistics.
  - `<x-panel title="...">...</x-panel>` slotted container.
- **Authentication Flow**:
  - Protected `/dashboard` and `/schedule` routes with `auth` middleware.
  - Manual lightweight authentication with session regeneration and POST logout.
  - Responsive navigation with `@auth` / `@guest` states.
- **Tailwind v3 & Vite Pipeline**:
  - Configured using PostCSS and Autoprefixer without CDN dependencies.
  - Custom palette using Indigo, Blue, and Slate.
