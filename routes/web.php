<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ClerkController;
use App\Http\Controllers\Facebook\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PolicyController;
use Illuminate\Support\Facades\Route;

// Home (Landing page)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth (local fallback)
Route::get('/login', [ClerkController::class, 'login'])->name('login');
Route::post('/login', [ClerkController::class, 'authenticate'])->name('login.post');
Route::get('/register', [ClerkController::class, 'register'])->name('register');
Route::post('/register', [ClerkController::class, 'store'])->name('register.post');
Route::post('/logout', [ClerkController::class, 'logout'])->name('logout');

Route::prefix('auth')->group(function () {
    Route::get('callback', [ClerkController::class, 'callback'])->name('auth.callback');
});

// Dashboard (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // Business resources
    Route::resource('pages', PageController::class);
    Route::resource('products', ProductController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('deliveries', DeliveryController::class);
    Route::resource('policies', PolicyController::class);
});

// Facebook webhook endpoint (no auth)
Route::post('/webhook/facebook', function () {
    // Facebook webhook handling will be delegated to a controller.
    return response('OK', 200);
})->name('webhook.facebook');
