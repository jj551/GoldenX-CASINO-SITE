# GoldenX Casino - Project Setup Guide

## Overview
GoldenX Casino Script is a Laravel-based online casino platform with games like Slots, Dice, Mines, CRASH, and more.

## Prerequisites
To run this project locally, you need:
- PHP 7.4 or higher
- Composer
- MySQL/MariaDB
- Node.js & NPM (for frontend assets)

## Quick Setup Steps

### 1. Install PHP Dependencies
```bash
cd GoldenX-CASINO-SITE
composer install
```

### 2. Configure Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Database Setup
Create a MySQL database and update `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Run Migrations
```bash
php artisan migrate --seed
```

### 5. Build Frontend Assets
```bash
npm install
npm run dev
```

### 6. Start Development Server
```bash
php artisan serve
```

Access the application at: http://localhost:8000

## Docker Setup (Alternative)

If you prefer Docker:
```bash
docker-compose up -d --build
```

## Features
- 🎰 Multiple casino games (Slots, Dice, Mines, CRASH, etc.)
- 💬 Live chat system
- 💰 Payment integration
- 🎁 Bonus system
- 📊 Analytics and reporting
- 🌐 Multi-language support

## Troubleshooting

### Permission Issues
```bash
chmod -R 775 storage bootstrap/cache
```

### Composer Not Found
Install Composer: https://getcomposer.org/download/

### PHP Not Found
Install PHP 7.4+: https://www.php.net/downloads.php

## Support
For issues and questions, contact the repository maintainers.
