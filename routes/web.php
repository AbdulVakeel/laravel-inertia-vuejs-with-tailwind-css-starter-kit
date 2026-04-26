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
/* Admin Routes  */

Route::middleware([
	'auth:sanctum',
])->group(function () {

	Route::group(['prefix' => 'admin'], function () {
		/* ! admin dashboard  */
		Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
		Route::get('/allUsers', [ManageUserController::class, 'index'])->name('admin.users.index');
		Route::get('/user/{id}', [ManageUserController::class, 'userInfo'])->name('admin.users-detail');
        Route::post('update-wallet', [ManageUserController::class, 'updateUserWallet'])->name('admin.update-wallet');
		Route::get('/buttion', [AdminDashboardController::class, 'buttion'])->name('admin.components.buttion');
		Route::get('packages', [InvestmentController::class, 'index'])->name('admin.investment.index');
        Route::post('packages', [InvestmentController::class, 'store'])->name('admin.investment.store');
        Route::put('packages/{id}', [InvestmentController::class, 'update'])->name('admin.investment.update');
        Route::put('/packages/status/{id}', [InvestmentController::class, 'status'])->name('admin.investment.status');

		 Route::controller(ReportController::class)->group(function () {
            Route::get('report-transaction', 'transaction')->name('admin.report.transaction');
        });


    Route::get('faq', [FaqController::class, 'index'])->name('admin.faqs.index');
        Route::post('faq-store', [FaqController::class, 'store'])->name('admin.faqs.store');
        Route::put('faq-update/{id}', [FaqController::class, 'update'])->name('admin.faqs.update');

		   Route::prefix('ticket')->name('admin.ticket.')->controller(SupportTicketController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/view/{id}', 'view')->name('view');
            Route::post('/reply/{id}', 'reply')->name('reply');
            Route::post('/close/{id}', 'close')->name('close');
        });

		// Admin Profile
		Route::get('/profile', [AdminProfileController::class, 'show'])->name('admin.profile.show');
		Route::put('/profile-information', [AdminProfileController::class, 'update'])
			->name('admin.profile.update');


		/* ! Roles & Permissions  */
		Route::resource('role', RoleController::class, ['names' => 'admin.role']);
	
	});


	/***********************************
	 * THIS IS A  staffs Controller *
	 ***********************************/
	Route::get('/manage/staffs', [StaffController::class, 'index'])->name('admin.staffs.index');
	Route::post('/manage/staffs', [StaffController::class, 'store'])->name('admin.staffs.store');
	Route::put('/staffs/{id}', [StaffController::class, 'update'])->name('admin.staffs.update');

	
	});

	
Route::get('/', function () {
	return to_route('user.dashboard');
})->name('home');

/* User Routes */

Route::middleware([
	'auth:sanctum',
	'email.verified',
	'admin.redirect',
	'user.is.active',
])->group(function () {

	Route::prefix('user')->group(function () {
		Route::get('/dashboard', [UserDashboardController::class, 'dashboardUser'])->name('user.dashboard');
		Route::get('/faq', [UserDashboardController::class, 'faq'])->name('user.faq.index');
        Route::get('/transactions/log', [ReportsController::class, 'transactionsLog'])->name('user.reports.transaction');
		  Route::controller(TicketController::class)
            ->prefix('ticket')
            ->name('user.ticket.')
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('new', 'create')->name('open');
                Route::post('create', 'store')->name('store');
                Route::get('view/{ticket}', 'show')->name('view');
                Route::post('reply/{id}', 'reply')->name('reply');
                Route::post('close/{id}', 'close')->name('close');
                Route::get('download/{attachment_id}', 'ticketDownload')->name('download');
            });

		// Profile
		Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')
			->withoutMiddleware(['admin.redirect']);
		Route::put('/profile-information', [ProfileController::class, 'update'])
			->name('user-profile-information.update')->withoutMiddleware(['admin.redirect']);
		});
	});
	
	
	/*| Register new user*/
Route::get('/signup', [RegisteredUserController::class, 'UserRegistrationForm'])->name('register');
Route::post('/registration', [RegisteredUserController::class, 'register'])->name('register.store');
/* ====================== */

require __DIR__ . '/auth.php';
