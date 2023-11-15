<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
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

// Route::get('/music/index', [MusicController::class, 'index'])
//     ->name('music');
// Route::get('/music/search', [MusicController::class, 'search'])
//     ->name('music.search');
// Route::post('/music/store', [MusicController::class, 'store'])
//     ->name('music.store');
// Route::get('/music/edit/{id}', [MusicController::class, 'edit'])
//     ->name('music.edit')->where('id', '[0-9]+');
// Route::put('/music/update/{id}', [MusicController::class, 'update'])
//     ->name('music.update')->where('id', '[0-9]+');
// Route::delete('/music/delete/{id}', [MusicController::class, 'delete'])
//     ->name('music.delete')->where('id', '[0-9]+');
//
Route::get('/recording/index', [RecordingController::class, 'index'])
    ->name('recording');
Route::get('/recording/show/{id}', [RecordingController::class, 'show'])
    ->name('recording.show');
//
// Route::get('/artist/index', [ArtistController::class, 'index'])
//     ->name('artist');
Route::get('/artist/show/{id}', [ArtistController::class, 'show'])
    ->name('artist.show');
//

Route::get('/', TopController::class)
    ->name('top');
Route::get('/search/index', [SearchController::class, 'index'])
    ->name('search.index');
Route::get('/search/music', [SearchController::class, 'music'])
    ->name('search.music');
Route::get('/search/artist', [SearchController::class, 'artist'])
    ->name('search.artist');
Route::get('/search/review', [SearchController::class, 'review'])
    ->name('search.review');

Route::get('/review/create', [ReviewController::class, 'create'])
    ->name('review.create');
Route::post('/review/store', [ReviewController::class, 'store'])
    ->name('review.store');
Route::get('/review/edit', [ReviewController::class, 'edit'])
    ->name('review.edit');
Route::post('/review/update', [ReviewController::class, 'update'])
    ->name('review.update');

// Route::get('/user/index', [UserController::class, 'index'])
//     ->name('user');
// Route::get('/user/show/{id}', [UserController::class, 'show'])
//     ->name('user.show');


Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
