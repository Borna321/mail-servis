<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MailController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [ProfileController::class, 'dash'])->name('dashboard');

Route::get('/inbox', [MailController::class, 'inbox'])->middleware(['auth', 'verified'])->name('inbox');
Route::get('/sent', [MailController::class, 'sent'])->middleware(['auth', 'verified'])->name('sent');
Route::get('/junk', [MailController::class, 'junk'])->middleware(['auth', 'verified'])->name('junk');
Route::get('/trash', [MailController::class, 'trash'])->middleware(['auth', 'verified'])->name('trash');
Route::get('/newmail', [MailController::class, 'newmail'])->middleware(['auth', 'verified'])->name('newmail');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
