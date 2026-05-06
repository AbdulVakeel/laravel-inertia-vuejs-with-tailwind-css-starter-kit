<?php

/*=========================================================================================  
  Item Name: Sky Code Lab 
  Author: Abdul Vakeel
  Author URL: https://www.skycodelab.in/
==========================================================================================*/

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\InvestmentController;
use App\Http\Controllers\Admin\ReportController;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestController;

/* ================= HOME ROUTES ================= */

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/leaderboard', function () {
    return Inertia::render('Leaderboard');
})->name('leaderboard');

Route::get('/how-it-works', function () {
    return Inertia::render('HowItWorks');
})->name('how-it-works');


/* ================= ADMIN ROUTES ================= */

Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('admin')->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

        // Users
        Route::get('/allUsers', [ManageUserController::class, 'index'])->name('admin.users.index');
        Route::get('/user/{id}', [ManageUserController::class, 'userInfo'])->name('admin.users-detail');
        Route::post('/update-wallet', [ManageUserController::class, 'updateUserWallet'])->name('admin.update-wallet');
        Route::post('/status/{id}', [ManageUserController::class, 'status'])->name('admin.users.status');

        // Components
        Route::get('/buttion', [AdminDashboardController::class, 'buttion'])->name('admin.components.buttion');

        // Investment Packages
        Route::get('/packages', [InvestmentController::class, 'index'])->name('admin.investment.index');
        Route::post('/packages', [InvestmentController::class, 'store'])->name('admin.investment.store');
        Route::put('/packages/{id}', [InvestmentController::class, 'update'])->name('admin.investment.update');
        Route::put('/packages/status/{id}', [InvestmentController::class, 'status'])->name('admin.investment.status');

        // Reports
        Route::controller(ReportController::class)->group(function () {
            Route::get('/report-transaction', 'transaction')->name('admin.report.transaction');
        });

        // FAQ
        Route::get('/faq', [FaqController::class, 'index'])->name('admin.faqs.index');
        Route::post('/faq-store', [FaqController::class, 'store'])->name('admin.faqs.store');
        Route::put('/faq-update/{id}', [FaqController::class, 'update'])->name('admin.faqs.update');

        // Support Ticket
        Route::prefix('ticket')
            ->name('admin.ticket.')
            ->controller(SupportTicketController::class)
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/view/{id}', 'view')->name('view');
                Route::post('/reply/{id}', 'reply')->name('reply');
                Route::post('/close/{id}', 'close')->name('close');
            });

        // Admin Profile
        Route::get('/profile', [AdminProfileController::class, 'show'])->name('admin.profile.show');
        Route::put('/profile-information', [AdminProfileController::class, 'update'])->name('admin.profile.update');

        // Roles & Permissions
        Route::resource('role', RoleController::class, ['names' => 'admin.role']);
    });


    /* ================= STAFF ROUTES ================= */

    Route::get('/manage/staffs', [StaffController::class, 'index'])->name('admin.staffs.index');
    Route::post('/manage/staffs', [StaffController::class, 'store'])->name('admin.staffs.store');
    Route::put('/staffs/{id}', [StaffController::class, 'update'])->name('admin.staffs.update');
});


/* ================= USER ROUTES ================= */

Route::middleware([
    'auth:sanctum',
    'email.verified',
    'admin.redirect',
    'user.is.active',
])->group(function () {

    Route::prefix('user')->group(function () {

        // Dashboard
        Route::get('/dashboard', [UserDashboardController::class, 'dashboardUser'])->name('user.dashboard');

        // FAQ
        Route::get('/faq', [UserDashboardController::class, 'faq'])->name('user.faq.index');

        // Transactions
        Route::get('/transactions/log', [ReportsController::class, 'transactionsLog'])->name('user.reports.transaction');

        // Ticket System
        Route::controller(TicketController::class)
            ->prefix('ticket')
            ->name('user.ticket.')
            ->group(function () {

                Route::get('/', 'index')->name('index');
                Route::get('/new', 'create')->name('open');
                Route::post('/create', 'store')->name('store');
                Route::get('/view/{ticket}', 'show')->name('view');
                Route::post('/reply/{id}', 'reply')->name('reply');
                Route::post('/close/{id}', 'close')->name('close');
                Route::get('/download/{attachment_id}', 'ticketDownload')->name('download');
            });

        // Investment
        Route::get('/reports/log', [InvestController::class, 'investLog'])->name('reports.invest');
        Route::get('/invest/investment', [InvestController::class, 'index'])->name('invest.investment');
        Route::post('/invest/investment', [InvestController::class, 'store'])->name('invest.investment.store');

        // Profile
        Route::get('/profile', [ProfileController::class, 'show'])
            ->name('profile.show')
            ->withoutMiddleware(['admin.redirect']);

        Route::put('/profile-information', [ProfileController::class, 'update'])
            ->name('user-profile-information.update')
            ->withoutMiddleware(['admin.redirect']);
    });
});


/* ================= AUTH ROUTES ================= */

// Register
Route::get('/signup', [RegisteredUserController::class, 'UserRegistrationForm'])->name('register');
Route::post('/registration', [RegisteredUserController::class, 'register'])->name('register.store');

// Auth Routes
require __DIR__ . '/auth.php';