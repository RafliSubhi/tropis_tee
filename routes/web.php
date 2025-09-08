<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/menu', [PageController::class, 'menu'])->name('menu');
Route::get('/testimoni', [PageController::class, 'testimoni'])->name('testimoni');
Route::post('/testimoni', [PageController::class, 'storeTestimonial'])->name('testimoni.store');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');
Route::get('/berita', [PageController::class, 'allArticles'])->name('articles.index');
Route::get('/berita/{article}', [PageController::class, 'showArticle'])->name('articles.show');
Route::get('/anggota/{employee}', [PageController::class, 'showEmployee'])->name('employee.detail');

// Redirect /admin to /admin/dashboard
Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
});

// Admin Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('admin/login', [LoginController::class, 'login']);
});

// Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Product Routes
    Route::resource('products', ProductController::class);

    // Testimonial Routes
    Route::get('testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('testimonials/{testimonial}/toggle-like', [TestimonialController::class, 'toggleLike'])->name('testimonials.toggleLike');
    Route::delete('testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Employee Routes
    Route::resource('employees', EmployeeController::class);

    // Article Routes
    Route::resource('articles', ArticleController::class);

    // Admin Management Routes
    Route::resource('admins', AdminController::class)->except(['show']);

    // Account Management Routes
    Route::get('account', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('account', [AccountController::class, 'update'])->name('account.update');

    // Settings Routes
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});
