<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController as AdminDashboardController;
use App\Http\Controllers\DrukwerkContactController;
use App\Http\Controllers\DrukwerkController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Drukwerk subdomain (static site)
Route::domain(config('app.drukwerk_domain'))->group(function () {
    Route::get('/', [DrukwerkController::class, 'index'])->name('drukwerk.index');

    Route::get('/offerte', [DrukwerkContactController::class, 'create'])->name('drukwerk.contact.create');
    Route::post('/offerte', [DrukwerkContactController::class, 'store'])->middleware('throttle:contact')->name('drukwerk.contact.store');
});

// Public pages
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/over-ons', [AboutUsController::class, 'index'])->name('about.index');
Route::get('/aanbod', [OfferController::class, 'index'])->name('offers.index');
Route::get('/vormingen', [FormationController::class, 'index'])->name('formations.index');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/{tag:slug}', [TagController::class, 'show'])->name('tags.show');

Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->middleware('throttle:contact')->name('contact.store');

// Logged in pages
Route::redirect('/dashboard', '/admin')->name('dashboard');

// Admin pages
Route::prefix('admin')->middleware('auth', IsAdmin::class)->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles', AdminArticleController::class);
    Route::resource('categories', AdminCategoryController::class);

    Route::resource('customers', AdminCustomerController::class);
    Route::resource('packages', AdminPackageController::class);
    Route::patch('contacts/{contact}/spam', [AdminContactController::class, 'toggleSpam'])->name('contacts.toggle-spam');
    Route::delete('contacts/spam', [AdminContactController::class, 'destroySpam'])->name('contacts.destroy-spam');
    Route::resource('contacts', AdminContactController::class);
    Route::resource('formations', AdminFormationController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('tags', AdminTagController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/redirect.php';
