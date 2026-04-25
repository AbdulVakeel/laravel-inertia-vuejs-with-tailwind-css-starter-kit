<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="350" alt="Laravel Logo">
  
  <h1 align="center" style="margin-top: 20px; font-size: 2.5rem;">🚀 Laravel + Vue.js Admin Panel And User Admin</h1>
  
  <p align="center">
    <strong>⚡ Modern, Fast & Scalable Admin Dashboard And User Dashboard </strong>
  </p>

  <p align="center">
    <img src="https://img.shields.io/badge/Laravel-10.45-red?logo=laravel&style=for-the-badge" alt="Laravel Version">
    <img src="https://img.shields.io/badge/Vue.js-3.4.0-4FC08D?logo=vue.js&style=for-the-badge" alt="Vue.js Version">
    <img src="https://img.shields.io/badge/Inertia.js-1.0.0-9553E9?logo=inertia&style=for-the-badge" alt="Inertia.js">
    <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?logo=tailwind-css&style=for-the-badge" alt="Tailwind CSS">
  </p>

  <p align="center">
    <a href="https://github.com/laravel/framework/actions">
      <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
  </p>

  <br>

  <a href="https://laravel-inertia-demo.skycodelab.in/login" target="_blank">
    <img src="https://skycodelab.in/public/git/logo.png" width="180" alt="Sky Code Lab Logo">
  </a>

  <br><br>

  <a href="https://www.buymeacoffee.com/abdulvakeel" target="_blank">
    <img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" height="50">
  </a>
</div>

---

## ✨ Features at a Glance

| Feature | Description |
|---------|-------------|
| 🎨 **Modern Stack** | Laravel 10 + Vue 3 + Inertia.js + Tailwind CSS |
| 👥 **Role Management** | Complete Admin & Staff roles with permissions |
| 📱 **Fully Responsive** | Works perfectly on all devices |
| 🎯 **Reusable Components** | Buttons, Headings, Cards, and more |
| 🔐 **Authentication** | Secure Login, Registration & Profile Management |
| 🎨 **Beautiful UI** | Modern admin dashboard with clean design |

---

## 🖼️ Screenshots

<div align="center">
  <table>
    <tr>
      <td align="center"><b>✨ Latest Dashboard</b></td>
      <td align="center"><b>🎨 Support</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/dashbord-latest.png" width="400"></td>
      <td align="center"><img src="https://skycodelab.in/public/git/support.png" width="400"></td>
    </tr>
    <tr>
      <td align="center"><b>👤 Login</b></td>
      <td align="center"><b>🔐 Signup</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/login-updated.png" width="400"></td>
      <td align="center"><img src="https://skycodelab.in/public/git/signup-updated.png" width="400"></td>
    </tr>
    <tr>
      <td align="center"><b>📝 Faq</b></td>
      <td align="center"><b>🎭 Language Translator</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/faq.png" width="400"></td>
      <td align="center"><img src="https://skycodelab.in/public/git/language-translator.png" width="400"></td>
    </tr>
    <!-- <tr>
      <td align="center"><b>📱 Mobile Responsive</b></td>
      <td align="center"><b>🗂️ Sidebar (User/Admin)</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/mobile.png" width="250"></td>
      <td align="center"><img src="https://skycodelab.in/public/git/sidebar.png" width="250"></td>
    </tr> -->
  </table>
</div>

---

## 🛠️ Tech Stack

<div align="center">
  <img src="https://laravel.com/img/logotype.min.svg" width="60" alt="Laravel" style="margin: 10px;">
  <img src="https://avatars.githubusercontent.com/u/6128107?s=200&v=4" width="60" alt="Vue.js" style="margin: 10px;">
  <img src="https://avatars.githubusercontent.com/u/47703742?s=200&v=4" width="60" alt="Inertia" style="margin: 10px;">
  <img src="https://avatars.githubusercontent.com/u/67109815?s=48&v=4" width="60" alt="Tailwind" style="margin: 10px;">
</div>

| Technology | Version |
|------------|---------|
| Laravel | 10.45 |
| Vue.js | 3.4.0 |
| Inertia.js (Vue3) | 1.0.0 |
| Tailwind CSS | 3.x |

---

## 📦 Installation Guide

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & NPM/Yarn
- MySQL/Database

### Step-by-Step Setup

```bash
# 1. Clone the repository
git clone your-repository-url
cd your-project-folder

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install   # or yarn install

# 4. Environment configuration
cp .env.example .env

# 5. Configure your database in .env file
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

# 6. Generate application key
php artisan key:generate

# 7. Run migrations & seeders
php artisan migrate --seed

# 8. Build assets (in one terminal)
npm run dev   # or yarn dev

# 9. Start development server (in another terminal)
php artisan serve

# 10. Register as admin
# Visit http://127.0.0.1:8000/register

# 11. Clear cache (optional)
# Visit http://127.0.0.1:8000/clear
