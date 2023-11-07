<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Bookmark\BookmarkController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', WelcomeController::class);

Route::middleware([
      'auth:sanctum',
      config('jetstream.auth_session'),
      'verified',
    ])
    ->group(function () {
        //Route::get('/dashboard', function () { return Inertia::render('Dashboard'); })->name('dashboard');

        Route::get('/dashboard', [BookMarkController::class, 'index'])->name('bookmark.index');
        Route::get('/create', [BookMarkController::class, 'create'])->name('bookmark.create');
        Route::post('/store', [BookMarkController::class, 'store'])->name('bookmark.store');
    });
