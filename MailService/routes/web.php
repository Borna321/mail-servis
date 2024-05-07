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

// route invoked by log in
Route::get('/dashboard', [ProfileController::class, 'dash'])->name('dashboard');

// navigation bar routes
Route::get('/inbox', [MailController::class, 'inbox'])->middleware(['auth', 'verified'])->name('inbox');
Route::get('/sent', [MailController::class, 'sent'])->middleware(['auth', 'verified'])->name('sent');
Route::get('/sent_detailed', [MailController::class, 'sent_detailed'])->middleware(['auth', 'verified'])->name('sent_detailed')
Route::get('/junk', [MailController::class, 'junk'])->middleware(['auth', 'verified'])->name('junk');
Route::get('/trash', [MailController::class, 'trash'])->middleware(['auth', 'verified'])->name('trash');
Route::get('/newmail', [MailController::class, 'newmail'])->middleware(['auth', 'verified'])->name('newmail');

//sending mail
Route::get('/addmail', [MailController::class, 'addmail'])->middleware(['auth', 'verified'])->name('addmail');

//deleting mail
Route::get('/delete_sender_mail', [MailController::class, 'delete_sender_mail'])->middleware(['auth', 'verified'])->name('delete_sender_mail');
Route::get('/delete_reciever_mail', [MailController::class, 'delete_reciever_mail'])->middleware(['auth', 'verified'])->name('delete_reciever_mail');

//trash
Route::get('/move_to_trash', [MailController::class, 'move_to_trash'])->middleware(['auth', 'verified'])->name('move_to_trash');
Route::get('/delete_from_trash', [MailController::class, 'delete_from_trash'])->middleware(['auth', 'verified'])->name('delete_from_trash');

//open mail
Route::get('/open_mail', [MailController::class, 'open_mail'])->middleware(['auth', 'verified'])->name('open_mail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';
