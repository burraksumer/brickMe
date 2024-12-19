<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AvatarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/avatar/generate', [AvatarController::class, 'generate'])->name('avatar.generate');
    Route::get('/avatar/{path}', [AvatarController::class, 'show'])
        ->where('path', '.*')
        ->name('avatar.show');
    Route::get('/avatars', [AvatarController::class, 'gallery'])->name('avatar.gallery');
});

Route::view('/terms', 'legal.terms')->name('terms');
Route::view('/privacy', 'legal.privacy')->name('privacy');
Route::view('/refund', 'legal.refund')->name('refund');

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

require __DIR__.'/auth.php';
