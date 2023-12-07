<?php

namespace App\Http\Controllers;

use App\Models\Recording;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class FavoriteRecordingController extends Controller
{
    public function store(Recording $recording)
    {
        try {
            Auth::user()->favoriteRecordings()->attach($recording);
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'お気に入り登録に失敗しました。');
        }

        return back()
            ->with('feedback.success', 'お気に入り登録に成功しました。');
    }

    public function destroy(Recording $recording)
    {
        try {
            $detachedRows = Auth::user()->favoriteRecordings()->detach($recording);
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
