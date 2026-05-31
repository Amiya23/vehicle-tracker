<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ReminderController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::put(
    '/vehicles/{id}/odometer',
    [DashboardController::class,
    'updateOdometer']
    );

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');

    Route::post(
        '/vehicles',
        [DashboardController::class, 'store']
    );

    Route::put(
    '/vehicles/{id}',
    [DashboardController::class, 'update']
    );

    Route::delete(
        '/vehicles/{id}',
        [DashboardController::class, 'destroy']
    );

    Route::get(
    '/profile',
    [ProfileController::class, 'index']
    );
    
    Route::get(
    '/reminder',
    [ReminderController::class, 'index']
    );

    Route::put(
    '/vehicles/{id}/renew-tax',
    [DashboardController::class,
    'renewTax']
    );
});

require __DIR__.'/auth.php';