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
use App\Http\Controllers\FavoriteRecordingController;
use App\Http\Controllers\FavoriteArtistController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ContactController;
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

// top
Route::get('/', [TopController::class, 'index'])
    ->name('top');
Route::get('/help', [TopController::class, 'help'])
    ->name('help');

// search
Route::get('/search/index', [SearchController::class, 'index'])
    ->name('search.index');
Route::get('/search/music', [SearchController::class, 'music'])
    ->name('search.music');
Route::get('/search/artist', [SearchController::class, 'artist'])
    ->name('search.artist');
Route::get('/search/review', [SearchController::class, 'review'])
    ->name('search.review');

// music, recording, artist
Route::get('/musics/{music}', [MusicController::class, 'show'])
    ->name('music.show');
Route::get('/recordings/{recording}', [RecordingController::class, 'show'])
    ->name('recording.show')->where('recording', '[0-9]+');
Route::get('/artists/{artist}', [ArtistController::class, 'show'])
    ->name('artist.show');

// review
Route::get('/review/{review}', [ReviewController::class, 'show'])
    ->name('review.show')->where('review', '[0-9]+');
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/review/create/{recording}', [ReviewController::class, 'create'])
        ->name('review.create')->where('recording', '[0-9]+');
    Route::post('/review/store/{recording}', [ReviewController::class, 'store'])
        ->name('review.store')->where('recording', '[0-9]+');
    Route::get('/review/edit/{recording}', [ReviewController::class, 'edit'])
        ->name('review.edit')->where('recording', '[0-9]+');
    Route::put('/review/update/{recording}', [ReviewController::class, 'update'])
        ->name('review.update')->where('recording', '[0-9]+');
    Route::delete('/review/delete/{review}', [ReviewController::class, 'delete'])
        ->name('review.delete')->where('review', '[0-9]+');
});

// user
Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('user.show')->where('user', '[0-9]+');
Route::get('/users/{user}/reviews', [UserController::class, 'reviews'])
    ->name('user.reviews')->where('user', '[0-9]+');
Route::get('/users/{user}/follows', [UserController::class, 'follows'])
    ->name('user.follows')->where('user', '[0-9]+');
Route::get('/users/{user}/followers', [UserController::class, 'followers'])
    ->name('user.followers')->where('user', '[0-9]+');

Route::middleware(['auth', 'verified'])->group(function () {
    // home
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');
    Route::get('/home/following_users', [HomeController::class, 'following_users'])
        ->name('home.following_users');
    Route::get('/home/reviews', [HomeController::class, 'reviews'])
        ->name('home.reviews');
    Route::get('/home/profile', [HomeController::class, 'edit_profile'])
        ->name('home.edit_profile');

    // profile
    Route::put('/profile/update_user_icon', [ProfileController::class, 'updateUserIcon'])
        ->name('profile.update_user_icon');
    Route::put('/profile/update_self_introduction', [ProfileController::class, 'updateSelfIntroduction'])
        ->name('profile.update_self_introduction');

    // like
    Route::post('/reviews/{review}/likes', [LikeController::class, 'store'])
        ->name('likes.store');
    Route::delete('/reviews/{review}/likes/destroy', [LikeController::class, 'destroy'])
        ->name('likes.destroy');

    // follow
    Route::post('/follow/{user}/store', [FollowController::class, 'store'])
        ->name('follow.store');
    Route::delete('/follow/{user}/destroy', [FollowController::class, 'destroy'])
        ->name('follow.destroy');

    // favorite recording
    Route::post('/favoriteRecording/{recording}/store', [FavoriteRecordingController::class, 'store'])
        ->name('favoriteRecording.store');
    Route::delete('/favoriteRecording/{recording}/destroy', [FavoriteRecordingController::class, 'destroy'])
        ->name('favoriteRecording.destroy');

    // favorite artist
    Route::post('/favoriteArtist/{artist}/store', [FavoriteArtistController::class, 'store'])
        ->name('favoriteArtist.store');
    Route::delete('/favoriteArtist/{artist}/destroy', [FavoriteArtistController::class, 'destroy'])
        ->name('favoriteArtist.destroy');
});

// theme
Route::post('/set-theme', [ThemeController::class, 'set']);

// contact
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])
    ->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');

// breeze
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
