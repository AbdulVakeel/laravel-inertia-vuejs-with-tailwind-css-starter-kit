<div align="center">
  
  <h1 align="center" style="margin-top: 20px; font-size: 2.8rem;">
    🚀 Laravel + Vue.js Admin Panel And User Admin
  </h1>
  
  <p align="center">
    <strong>⚡ Modern, Fast & Scalable Admin Dashboard And User Dashboard</strong>
  </p>

  <!-- ⭐ STAR CTA -->
  <p align="center">
    ⭐ <b>If you like this project, please give it a STAR ⭐ on GitHub — it really helps!</b>
  </p>

  <p align="center">
    <img src="https://img.shields.io/badge/Laravel-10.45-red?logo=laravel&style=for-the-badge" alt="Laravel Version">
    <img src="https://img.shields.io/badge/Vue.js-3.4.0-4FC08D?logo=vue.js&style=for-the-badge" alt="Vue.js Version">
    <img src="https://img.shields.io/badge/Inertia.js-1.0.0-9553E9?logo=inertia&style=for-the-badge" alt="Inertia.js">
    <img src="https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?logo=tailwind-css&style=for-the-badge" alt="Tailwind CSS">
  </p>

  <p align="center">
    <a href="https://github.com/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit">
      <img src="https://img.shields.io/github/stars/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit?style=for-the-badge" alt="Stars">
    </a>
    <a href="https://github.com/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit/fork">
      <img src="https://img.shields.io/github/forks/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit?style=for-the-badge" alt="Forks">
    </a>
  </p>

  <br>

  <a href="https://laravel-inertia-demo.skycodelab.in/login" target="_blank">
    <img src="https://skycodelab.in/public/git/logo.png" width="180" alt="Demo Logo">
  </a>

  <br><br>

  <a href="https://www.buymeacoffee.com/abdulvakeel" target="_blank">
    <img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" height="50">
  </a>
</div>

---

## ⭐ **One Small Request**

<div align="center">
  <table>
    <tr>
      <td align="center">
        <h3>🌟 If you find this project useful:</h3>
        <p>
          <a href="https://github.com/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit">
            <img src="https://img.shields.io/badge/⭐_STAR_THIS_REPO-ffc107?style=for-the-badge&logo=github&logoColor=black" alt="Star this repo" width="300">
          </a>
        </p>
        <p><strong>It takes 2 seconds and helps others discover this project! 🙏</strong></p>
      </td>
    </tr>
  </table>
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
| 💰 **Wallet System** | Deposit & Earning wallet for users |
| 🌍 **Multi Language** | Built-in language translator |

---

## 🖼️ Screenshots

<div align="center">
  <table>
    <tr>
      <td align="center"><b>✨ Latest Dashboard</b></td>
      <td align="center"><b>🎨 Support</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/Latest-Dashboard.png" width="400"></td>
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
    <tr>
      <td align="center"><b>📝 Membership Plans</b></td>
      <td align="center"><b>🎭 User Dashboard</b></td>
    </tr>
    <tr>
      <td align="center"><img src="https://skycodelab.in/public/git/Membership-Plans.png" width="400"></td>
      <td align="center"><img src="https://skycodelab.in/public/git/User-Dashboard.png" width="400"></td>
    </tr>
  </table>
</div>

## 📦 Installation Guide

### Prerequisites
- PHP >= 8.1  
- Composer  
- Node.js & NPM/Yarn  
- MySQL/Database  

### Step-by-Step Setup

```bash
# 1. Clone the repository
git clone https://github.com/AbdulVakeel/laravel-inertia-vuejs-with-tailwind-css-starter-kit.git
cd laravel-inertia-vuejs-with-tailwind-css-starter-kit

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

# 8. Build assets
npm run dev

# 9. Start development server
php artisan serve

# 10. Register as admin
# Visit http://127.0.0.1:8000/register

# 11. Clear cache (optional)
# Visit http://127.0.0.1:8000/clear
