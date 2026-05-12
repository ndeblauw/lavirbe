<?php

use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('categories.show');

Route::get('/faqs', [\App\Http\Controllers\FaqController::class, 'index'])->name('faqs.index');

// User pages

// Admin pages
Route::prefix('admin')->middleware('auth', \App\Http\Middleware\IsAdmin::class)->name('admin.')->group( function() {
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->except(['show']);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('users/{id}/make-admin', [\App\Http\Controllers\Admin\UserController::class, 'makeAdmin'])->name('users.make-admin');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
