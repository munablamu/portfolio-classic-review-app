<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function store(Request $request, Review $review)
    {
        try {
            DB::transaction(function () use ($review) {
                $review->likes()->create([
                    'user_id' => Auth::id(),
                ]);
                $review->increment('like');
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'いいねに失敗しました。');
        }

        return back()
            ->with('feedback.success', 'いいねに成功しました。');
    }

    public function destroy(Request $request, Review $review)
    {
        try {
            DB::transaction(function () use ($review) {
                $like = Like::where('user_id', Auth::id())
                    ->where('review_id', $review->id)
                    ->firstOrFail();
                $like->delete();
                $review->decrement('like');
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return back()
                ->with('feedback.error', 'いいねの解除に失敗しました。');
        }

        return back()
            ->with('feedback.success', 'いいねの解除に成功しました。');
    }
}
