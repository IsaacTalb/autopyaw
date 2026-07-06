<?php

use App\Http\Controllers\Auth\Auth0Controller;
use App\Http\Controllers\DashboardController;
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

Route::prefix('auth')->group(function () {
    Route::get('login', [Auth0Controller::class, 'login'])->name('auth.login');
    Route::get('callback', [Auth0Controller::class, 'callback'])->name('auth.callback');
    Route::post('logout', [Auth0Controller::class, 'logout'])->name('auth.logout');
});

Route::get('/login', fn () => redirect()->route('auth.login'))->name('login');
Route::get('/register', fn () => redirect()->route('auth.login'))->name('register');
Route::post('/logout', [Auth0Controller::class, 'logout'])->name('logout');

// Dashboard (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    // Business resources
    Route::resource('pages', PageController::class);
    Route::resource('products', ProductController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('deliveries', DeliveryController::class)->except(['show']);
    Route::resource('policies', PolicyController::class)->except(['show']);
});

// Facebook webhook endpoint (no auth)
Route::post('/webhook/facebook', function () {
    // Facebook webhook handling will be delegated to a controller.
    return response('OK', 200);
})->name('webhook.facebook');
