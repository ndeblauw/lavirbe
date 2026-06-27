<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/aanbod', [OfferController::class, 'index'])->name('offers.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [App\Http\Controllers\ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/like', [App\Http\Controllers\ArticleController::class, 'like'])->name('articles.like');
Route::get('/articles/{article}/unlike', [App\Http\Controllers\ArticleController::class, 'unlike'])->name('articles.unlike');

Route::get('/faqs', [FaqController::class, 'index'])->name('faqs.index');

Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

// User pages

// Admin pages
Route::prefix('admin')->middleware('auth', IsAdmin::class)->name('admin.')->group(function () {
    Route::resource('articles', ArticleController::class)->except(['show']);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class)->except(['show']);
    Route::resource('users', UserController::class);
    Route::get('users/{id}/make-admin', [UserController::class, 'makeAdmin'])->name('users.make-admin');
    Route::resource('customers', CustomerController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('contacts', AdminContactController::class);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
