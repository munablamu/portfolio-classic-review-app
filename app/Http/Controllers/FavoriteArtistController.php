<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class FavoriteArtistController extends Controller
{
    public function store(Artist $artist)
    {
        try {
            Auth::user()->favoriteArtists()->attach($artist);
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'お気に入り登録に失敗しました。');
        }

        return back()
            ->with('feedback.success', 'お気に入り登録に成功しました。');
    }

    public function destroy(Artist $artist)
    {
        try {
            $detachedRows = Auth::user()->favoriteArtists()->detach($artist);
            if ( $detachedRows === 0 ) {
                throw new Exception();
            }
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'お気に入り登録の解除に失敗しました。');
        }

        return back()
            ->with('feedback.success', 'お気に入り登録の解除に成功しました。');
    }
}
