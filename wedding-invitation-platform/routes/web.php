<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomRequestController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Template routes
Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show');

// Custom request routes
Route::get('/custom-requests/create', [CustomRequestController::class, 'create'])->name('custom-requests.create');
Route::post('/custom-requests', [CustomRequestController::class, 'store'])->name('custom-requests.store');

// Authentication routes (will be added by Laravel Breeze/Jetstream)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Order routes
    Route::resource('orders', OrderController::class);
    
    // User custom requests
    Route::get('/my-requests', [CustomRequestController::class, 'myRequests'])->name('custom-requests.my-requests');
    Route::get('/custom-requests/{customRequest}', [CustomRequestController::class, 'show'])->name('custom-requests.show');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('templates', TemplateController::class)->except(['index', 'show']);
    Route::resource('custom-requests', CustomRequestController::class)->except(['create', 'store', 'show']);
    Route::get('/custom-requests/{customRequest}/assign', [CustomRequestController::class, 'assignEditor'])->name('custom-requests.assign');
    Route::post('/custom-requests/{customRequest}/assign', [CustomRequestController::class, 'assignEditorStore'])->name('custom-requests.assign-store');
});

// Editor routes
Route::middleware(['auth', 'role:editor'])->prefix('editor')->name('editor.')->group(function () {
    Route::get('/assigned-requests', [CustomRequestController::class, 'assignedRequests'])->name('custom-requests.assigned');
    Route::get('/custom-requests/{customRequest}/edit', [CustomRequestController::class, 'edit'])->name('custom-requests.edit');
    Route::put('/custom-requests/{customRequest}', [CustomRequestController::class, 'update'])->name('custom-requests.update');
});

// Temporary routes for development (remove in production)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/logout', function () {
    return redirect('/');
})->name('logout');
