<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CompatibilityController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Installer;
use App\Http\Controllers\Customer;
use App\Http\Controllers\PublicPageController;

        Route::get('/', function () {
            if (auth()->check()) {
                if (auth()->user()->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                }
                if (auth()->user()->hasRole('installer')) {
                    return redirect()->route('installer.dashboard');
                }
                if (auth()->user()->hasRole('customer')) {
                    return redirect()->route('customer.dashboard');
                }
            }
            return view('welcome'); 
        });
        // ─── PUBLIC STOREFRONT ROUTES ─────────────────────────────────────
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/products', [ShopController::class, 'index'])->name('shop');
        Route::get('/products/{product:slug}', [ShopController::class, 'show'])->name('shop.show');
        Route::get('/compatibility', [CompatibilityController::class, 'index'])->name('compatibility');
        Route::post('/compatibility/check', [CompatibilityController::class, 'check'])->name('compatibility.check');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

        // ─── CART SYSTEM (Available to all visitors) ─────────────────────
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/{product}', [CartController::class, 'remove'])->name('cart.remove');

        Route::get('/where-to-buy', [PublicPageController::class, 'whereToBuy'])->name('public.where-to-buy');
        Route::get('/find-electrician', [PublicPageController::class, 'findElectrician'])->name('public.find-electrician');


    // ─── CHECKOUT SYSTEM (Authentication Required) ───────────────────
        Route::middleware('auth')->group(function () {
            Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
            Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
            Route::get('/order-success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');
            // Core Breeze Profile Management
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

    // ─── ADMIN PANEL CORES DIRECTIVES ────────────────────────────────
    Route::redirect('/admin', '/admin/dashboard'); // Clean redirect helper
    Route::middleware(['auth', 'role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
            // Products CRUD Management
            Route::resource('products', Admin\ProductController::class);
            // Orders Management
            Route::get('/orders', [Admin\OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}', [Admin\OrderController::class, 'show'])->name('orders.show');
            Route::patch('/orders/{order}/status', [Admin\OrderController::class, 'updateStatus'])->name('orders.status');

            // Installations Scheduler
            Route::get('/installations', [Admin\InstallationController::class, 'index'])->name('installations.index');
            Route::get('/installations/{installation}', [Admin\InstallationController::class, 'show'])->name('installations.show');
            Route::patch('/installations/{installation}/assign', [Admin\InstallationController::class, 'assign'])->name('installations.assign');

            // User Settings
            Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
            Route::get('/users/{user}', [Admin\UserController::class, 'show'])->name('users.show');
            Route::patch('/users/{user}/role', [Admin\UserController::class, 'updateRole'])->name('users.role');
        });

    // ─── INSTALLER PORTAL (Trade Technicians) ─────────────────────────
    Route::middleware(['auth', 'role:installer']) // Must be lowercase to match database
        ->prefix('installer')
        ->name('installer.')
        ->group(function () {
            Route::get('/dashboard', [Installer\DashboardController::class, 'index'])->name('dashboard');
            Route::get('/jobs', [Installer\JobController::class, 'index'])->name('jobs.index');
            Route::get('/jobs/{installation}', [Installer\JobController::class, 'show'])->name('jobs.show');
            Route::patch('/jobs/{installation}/status', [Installer\JobController::class, 'updateStatus'])->name('jobs.status');
        });

    // ─── CUSTOMER PORTAL (Order History Management) ───────────────────
    Route::middleware(['auth', 'role:customer'])
        ->prefix('customer')
        ->name('customer.')
        ->group(function () {
            Route::get('/dashboard', [Customer\DashboardController::class, 'index'])->name('dashboard');
            Route::get('/orders', [Customer\OrderController::class, 'index'])->name('orders.index');
            Route::get('/orders/{order}', [Customer\OrderController::class, 'show'])->name('orders.show');
        });



// Load standard authentication files from Laravel Breeze
require __DIR__.'/auth.php';