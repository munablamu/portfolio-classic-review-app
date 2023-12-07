<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class FollowController extends Controller
{
    public function store(User $user)
    {
        try {
            if ( Auth::id() === $user->id ) {
                throw Exception();
            }

            Auth::user()->following()->attach($user);
        } catch ( \Throwable $e) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'フォローに失敗しました。');
        }

        return back()
            ->with('feedback.success', 'フォローに成功しました。');
    }

    public function destroy(User $user)
    {
        try {
            if ( Auth::id() === $user->id ) {
                throw Exception();
            }

            $detachedRows = Auth::user()->following()->detach($user);
            if ( $detachedRows === 0 ) {
                throw new Exception();
            }
        } catch ( \Throwable $e ) {
            return back()
                ->with('feedback.error', 'フォロー解除に失敗しました。');
        }

        return back()
            ->with('feedback.success', 'フォロー解除に成功しました。');
    }
}
