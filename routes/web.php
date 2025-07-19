<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomRequestController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Static Pages
Route::get('/gallery', function () {
    return view('pages.gallery');
})->name('gallery');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');

Route::get('/help', function () {
    return view('pages.help');
})->name('help');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/tutorial', function () {
    return view('pages.tutorial');
})->name('tutorial');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('terms');

Route::get('/sitemap', function () {
    return view('pages.sitemap');
})->name('sitemap');

// Templates - Public browsing
Route::get('/templates', [TemplateController::class, 'index'])->name('templates.index');
Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show');
Route::get('/templates/{template}/preview', [TemplateController::class, 'preview'])->name('templates.preview');

// Public Invitations
Route::get('/invitation/{slug}', [InvitationController::class, 'publicShow'])->name('invitation.show');
Route::post('/invitation/{slug}/rsvp', [InvitationController::class, 'rsvp'])->name('invitation.rsvp');
Route::post('/invitation/{slug}/guest-book', [InvitationController::class, 'guestBook'])->name('invitation.guest-book');

/*
|--------------------------------------------------------------------------
| Guest Routes (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // My Invitations
    Route::get('/my-invitations', [InvitationController::class, 'myInvitations'])->name('my-invitations');
    
    // Invitation Management
    Route::resource('invitations', InvitationController::class)->except(['show']);
    Route::get('/invitations/{invitation}/edit-content', [InvitationController::class, 'editContent'])->name('invitations.edit-content');
    Route::patch('/invitations/{invitation}/content', [InvitationController::class, 'updateContent'])->name('invitations.update-content');
    Route::post('/invitations/{invitation}/publish', [InvitationController::class, 'publish'])->name('invitations.publish');
    Route::post('/invitations/{invitation}/duplicate', [InvitationController::class, 'duplicate'])->name('invitations.duplicate');
    
    // Template Purchase
    Route::post('/templates/{template}/purchase', [TemplateController::class, 'purchase'])->name('templates.purchase');
    Route::get('/templates/{template}/checkout', [TemplateController::class, 'checkout'])->name('templates.checkout');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    
    // Custom Requests
    Route::get('/custom-request', [CustomRequestController::class, 'create'])->name('custom-request');
    Route::resource('custom-requests', CustomRequestController::class)->except(['create']);
    
    // Payments
    Route::post('/payments/process', [PaymentController::class, 'process'])->name('payments.process');
    Route::get('/payments/{payment}/success', [PaymentController::class, 'success'])->name('payments.success');
    Route::get('/payments/{payment}/failed', [PaymentController::class, 'failed'])->name('payments.failed');
    
    // Payment Webhooks (should be excluded from CSRF)
    Route::post('/webhooks/payment/{gateway}', [PaymentController::class, 'webhook'])->name('payments.webhook');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Admin Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Template Management
    Route::resource('templates', TemplateController::class)->names([
        'index' => 'templates.index',
        'create' => 'templates.create',
        'store' => 'templates.store',
        'show' => 'templates.show',
        'edit' => 'templates.edit',
        'update' => 'templates.update',
        'destroy' => 'templates.destroy'
    ]);
    
    // User Management
    Route::get('/users', function () {
        return view('admin.users.index');
    })->name('users.index');
    
    Route::get('/users/{user}', function () {
        return view('admin.users.show');
    })->name('users.show');
    
    // Order Management
    Route::get('/orders', [OrderController::class, 'adminIndex'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'adminShow'])->name('orders.show');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    
    // Custom Request Management
    Route::get('/custom-requests', [CustomRequestController::class, 'adminIndex'])->name('custom-requests.index');
    Route::get('/custom-requests/{customRequest}', [CustomRequestController::class, 'adminShow'])->name('custom-requests.show');
    Route::patch('/custom-requests/{customRequest}/assign', [CustomRequestController::class, 'assign'])->name('custom-requests.assign');
    Route::patch('/custom-requests/{customRequest}/status', [CustomRequestController::class, 'updateStatus'])->name('custom-requests.update-status');
    
    // Analytics & Reports
    Route::get('/analytics', function () {
        return view('admin.analytics');
    })->name('analytics');
    
    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('reports');
    
    // Settings
    Route::get('/settings', function () {
        return view('admin.settings');
    })->name('settings');
});

/*
|--------------------------------------------------------------------------
| API Routes for AJAX requests
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('api')->name('api.')->group(function () {
    
    // Template search and filtering
    Route::get('/templates/search', [TemplateController::class, 'search'])->name('templates.search');
    Route::get('/templates/categories', [TemplateController::class, 'categories'])->name('templates.categories');
    
    // Invitation management
    Route::post('/invitations/{invitation}/upload-image', [InvitationController::class, 'uploadImage'])->name('invitations.upload-image');
    Route::delete('/invitations/{invitation}/delete-image', [InvitationController::class, 'deleteImage'])->name('invitations.delete-image');
    
    // Real-time preview
    Route::post('/invitations/{invitation}/preview', [InvitationController::class, 'livePreview'])->name('invitations.live-preview');
    
    // Guest list management
    Route::post('/invitations/{invitation}/guests', [InvitationController::class, 'addGuest'])->name('invitations.add-guest');
    Route::delete('/invitations/{invitation}/guests/{guest}', [InvitationController::class, 'removeGuest'])->name('invitations.remove-guest');
    Route::post('/invitations/{invitation}/guests/import', [InvitationController::class, 'importGuests'])->name('invitations.import-guests');
    
    // Analytics
    Route::get('/invitations/{invitation}/analytics', [InvitationController::class, 'analytics'])->name('invitations.analytics');
    Route::get('/orders/statistics', [OrderController::class, 'statistics'])->name('orders.statistics');
});

require __DIR__.'/auth.php';