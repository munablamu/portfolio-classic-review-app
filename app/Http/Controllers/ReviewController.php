<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recording;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function create(Request $request, Recording $recording)
    {
        Session::flash('reviewCreateBackUrl', url()->previous());

        return view('review.create',
            compact('recording'));
    }

    public function store(ReviewRequest $request, Recording $recording)
    {
        try {
            DB::transaction(function () use ($request) {
                $review = new Review;
                $form = $request->all();
                unset($form['_token']);
                $form['like'] = 0;
                $review->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect(Session::get('reviewCreateBackUrl'))
                ->with('feedback.error', 'レビューの投稿に失敗しました。');
        }

        return redirect(Session::get('reviewCreateBackUrl'))
            ->with('feedback.success', 'レビューの投稿に成功しました。');
    }

    public function edit(Request $request, Recording $recording)
    {
        Session::flash('reviewEditBackUrl', url()->previous());

        $review = Review::where('user_id', Auth::id())
            ->where('recording_id', $recording->id)
            ->firstOrFail();

        return view('review.edit',
            compact('recording', 'review'));
    }

    public function update(ReviewRequest $request, Recording $recording)
    {
        try {
            DB::transaction(function () use ($request, $recording) {
                $review = Review::where('user_id', Auth::id())
                    ->where('recording_id', $recording->id)
                    ->firstOrFail();
                $form = $request->all();
                unset($form['_token']);
                // ここではlikeの初期化はしない
                $review->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect(Session::get('reviewEditBackUrl'))
                ->with('feedback.error', 'レビューの編集に失敗しました。');
        }

        return redirect(Session::get('reviewEditBackUrl'))
            ->with('feedback.success', 'レビューの編集に成功しました。');
    }

    public function delete(Request $request, Review $review)
    {
        $reviewer_id = $review->user_id;
        if ( Auth::check() && $reviewer_id === Auth::id() ) {
            try {
                DB::transaction(function () use ($review) {
                    $review->delete();
                });
            } catch ( \Throwable $e ) {
                \Log::error($e);
                return back()
                    ->with('feedback.error', 'レビューの削除に失敗しました。');
            }

            return back()
                ->with('feedback.success', 'レビューの削除に成功しました。');
        }
    }
}
