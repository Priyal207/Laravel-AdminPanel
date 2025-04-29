<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RegistrationController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegistrationController::class, 'register']);

Route::get('/admin/login', [LoginController::class,'loginPage'])->name('admin.login.page');
Route::post('/admin/login', [LoginController::class,'login'])->name('admin.login');
// Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin.logout', [DashboardController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin_auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['admin_guest'])->group(function () {
    Route::get('/admin/login', [LoginController::class,'loginPage'])->name('admin.login.page');
    Route::post('/admin/login', [LoginController::class,'login'])->name('admin.login');
});

// User Management Routes
Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/destroy{id}',[UserController::class, 'destroy'])->name('users.destroy');
