<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrelloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('trello-redirect', [TrelloController::class, 'showRedirectPage'])->name('trello.redirect');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/connect-trello', function () {
        return view('trello-connection');
    });
    Route::get('login/trello', [TrelloController::class, 'redirectToTrello'])->name('login.trello');
    Route::get('/trello-auth', [TrelloController::class, 'handleTrelloAuth'])->name('trello.auth');
    Route::get('/trello-redirect', [TrelloController::class, 'showRedirectPage'])->name('trello.redirect');
    Route::get('/trello/all-cards', [TrelloController::class, 'getAllCards']);




    // Route for handling the callback after authentication
//    Route::get('login/trello/callback', [TrelloController::class, 'handleTrelloCallback'])->name('login.trello.callback');
});

require __DIR__.'/auth.php';
