<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\RecordingController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
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
// Route::get('/musics/{music}/edit', [MusicController::class, 'edit'])
//     ->name('music.edit')->where('music', '[0-9]+');
// Route::put('/musics/{music}/update', [MusicController::class, 'update'])
//     ->name('music.update')->where('music', '[0-9]+');
// Route::delete('/musics/{music}/delete', [MusicController::class, 'delete'])
//     ->name('music.delete')->where('music', '[0-9]+');
Route::get('/musics/{music}', [MusicController::class, 'show'])
    ->name('music.show');

Route::get('/recordings/index', [RecordingController::class, 'index'])
    ->name('recording');
Route::get('/recordings/{recording}', [RecordingController::class, 'show'])
    ->name('recording.show')->where('recording', '[0-9]+');
//
// Route::get('/artist/index', [ArtistController::class, 'index'])
//     ->name('artist');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])
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

Route::get('/review/create/{recording}', [ReviewController::class, 'create'])
    ->name('review.create')->where('recording', '[0-9]+');
Route::post('/review/store/{recording}', [ReviewController::class, 'store'])
    ->name('review.store')->where('recording', '[0-9]+');
Route::get('/review/edit/{recording}', [ReviewController::class, 'edit'])
    ->name('review.edit')->where('recording', '[0-9]+');
Route::post('/review/update/{recording}', [ReviewController::class, 'update'])
    ->name('review.update')->where('recording', '[0-9]+');
Route::delete('/review/delete/{review}', [ReviewController::class, 'delete'])
    ->name('review.delete')->where('review', '[0-9]+');

// Route::get('/user/index', [UserController::class, 'index'])
//     ->name('user');
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('user.show')->where('user', '[0-9]+');
Route::get('/users/{user}/reviews', [UserController::class, 'reviews'])
    ->name('user.reviews')->where('user', '[0-9]+');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');
    Route::get('/home/following_users', [HomeController::class, 'following_users'])
        ->name('home.following_users');
    Route::get('/home/reviews', [HomeController::class, 'reviews'])
        ->name('home.reviews');
    Route::get('/home/profile', [HomeController::class, 'edit_profile'])
        ->name('home.edit_profile');

    Route::post('/profile/update_user_icon', [ProfileController::class, 'updateUserIcon'])
        ->name('profile.update_user_icon');
    Route::post('/profile/update_self_introduction', [ProfileController::class, 'updateSelfIntroduction'])
        ->name('profile.update_self_introduction');
});

Route::post('/reviews/{review}/likes', [LikeController::class, 'store'])
    ->name('likes.store');
Route::delete('/reviews/{review}/likes/destroy', [LikeController::class, 'destroy'])
    ->name('likes.destroy');

Route::post('/follow/{user}/store', [FollowController::class, 'store'])
    ->name('follow.store');
Route::delete('/follow/{user}/destroy', [FollowController::class, 'destroy'])
    ->name('follow.destroy');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
