<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\BookmarkController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', WelcomeController::class);

Route::middleware([
      'auth:sanctum',
      config('jetstream.auth_session'),
      'verified',
    ])
    ->group(function () {
        Route::get('/dashboard', function () { return Inertia::render('Dashboard'); })->name('dashboard');
        Route::get('/bookmark', [BookMarkController::class, 'index'])->name('bookmark');
        Route::post('/bookmark', [BookMarkController::class, 'store'])->name('bookmark.store');
    });
