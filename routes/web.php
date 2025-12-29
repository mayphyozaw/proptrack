<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Backend\AdminUserController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/change-password',[PasswordController::class, 'edit'])->name('change-password.edit');
    Route::patch('/change-password',[PasswordController::class, 'update'])->name('change-password.update');
});


require __DIR__ . '/auth.php';

Route::get('admin/logout', [AdminController::class, 'adminLogout'])->name('admin-logout');

Route::middleware('auth')->group(function () {
    Route::resource('admin-user',AdminUserController::class);
    Route::get('admin-user-datatable', [AdminUserController::class, 'adminUserDatatable'])->name('admin-user-datatable');


    Route::resource('role',RolesController::class);
    Route::get('role-datatable', [RolesController::class, 'roleDatatable'])->name('role-datatable');


});



