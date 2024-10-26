<?php

use App\Http\Controllers\ImportController;

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


// input

Route::get('users/export/', [UsersController::class, 'export']);

Route::post('/import', [ImportController::class, 'import'])->name('import');

// View


Route::get('/importview', [UsersController::class, 'showImportView'])->name('importview');

Route::get('/export-users', [UsersController::class, 'export'])->name('export.users');

