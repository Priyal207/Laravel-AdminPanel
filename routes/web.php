<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RegistrationController;
use  App\Http\Controllers\Admin\RoleController;
use  App\Http\Controllers\Admin\PermissionController;




Route::get('/', function () {
    return view('welcome');
});


// Route::get('/admin/login', [LoginController::class,'loginPage'])->name('admin.login.page');
// Route::post('/admin/login', [LoginController::class,'login'])->name('admin.login');
// // Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
// Route::get('/admin.logout', [DashboardController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin_auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [DashboardController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['admin_guest'])->group(function () {
    Route::get('/admin/login', [LoginController::class,'loginPage'])->name('admin.login.page');
    Route::post('/admin/login', [LoginController::class,'login'])->name('admin.login');
    Route::get('register', [RegistrationController::class, 'loadRegister'])->name('loadRegister');
    Route::post('register', [RegistrationController::class, 'userRegister'])->name('userRegister');

});

// User Management Routes
Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/{id}',[UserController::class, 'show'])->name('users.show');
Route::get('/users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/destroy{id}',[UserController::class, 'destroy'])->name('users.destroy');

// Manage Role Route
Route::get('roles/index',[RoleController::class,'index'])->name('roles.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
Route::get('/roles/{id}',[RoleController::class, 'show'])->name('roles.show');
Route::get('/roles/edit/{id}',[RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/destroy{id}',[RoleController::class, 'destroy'])->name('roles.destroy');

// Manage Prmissions Route
Route::get('permission/index',[PermissionController::class,'index'])->name('permission.index');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission/store',[PermissionController::class,'store'])->name('permission.store');

// Assign Permission to role routes

Route::get('/assign-permission-role',[PermissionController::class, 'assignPermissionRole'])->name('assignPermissionRole');
Route::post('/assign-permissions', [PermissionController::class, 'assignPermissions'])->name('assignPermissions');

// Posts Route
Route::get('posts/index', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store',[PostController::class,'store'])->name('posts.store');
Route::get('posts/{id}',[PostController::class, 'show'])->name('posts.show');
Route::get('posts/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/destroy{id}',[PostController::class, 'destroy'])->name('posts.destroy');
