<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/music/index', [MusicController::class, 'index'])
    ->name('music');
Route::post('/music/store', [MusicController::class, 'store'])
    ->name('music.store');
Route::get('/music/edit/{id}', [MusicController::class, 'edit'])
    ->name('music.edit')->where('id', '[0-9]+');
Route::put('/music/update/{id}', [MusicController::class, 'update'])
    ->name('music.update')->where('id', '[0-9]+');
Route::delete('/music/delete/{id}', [MusicController::class, 'delete'])
    ->name('music.delete')->where('id', '[0-9]+');

Route::get('/recording/index', [RecordingController::class, 'index'])
    ->name('recording');

Route::get('/artist/index', [ArtistController::class, 'index'])
    ->name('artist');
Route::get('/artist/show/{id}', [ArtistController::class, 'show'])
    ->name('artist.show');

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
});

require __DIR__.'/auth.php';
