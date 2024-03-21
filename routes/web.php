<?php

/*=========================================================================================  
  Item Name: Sky Code Lab 
  Author: Sky Code Lab
  Author URL: https://www.skycodelab.io/
==========================================================================================*/

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;


/* Admin Routes  */

Route::middleware([
	'auth:sanctum',
])->group(function () {

	Route::group(['prefix' => 'admin'], function () {
		/* ! admin dashboard  */
		Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
		
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
