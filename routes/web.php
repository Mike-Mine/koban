<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    Route::view('profile', 'profile')->name('profile');

    Route::get('tickets', [\App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
    Route::view('tickets/create', 'tickets.create')->middleware('role:client')->name('tickets.create');
    Route::get('tickets/{ticket}', [\App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');
});



require __DIR__.'/auth.php';
