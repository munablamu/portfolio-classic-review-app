<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recording;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $recording_id = $request->get('recording_id');
        $recording = Recording::where('id', $recording_id)->firstOrFail();

        return view('review.create',
            compact('recording'));
    }

    public function store(ReviewRequest $request)
    {
        $recording_id = $request->post('recording_id');
        try {
            DB::transaction(function () use ($request) {
                $review = new Review;
                $form = $request->all();
                unset($form['_token']);
                $form['like'] = null;
                $review->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect()
                ->route('recording.show', ['id' => $recording_id])
                ->with('feedback.error', 'レビューの投稿に失敗しました。');
        }

        return redirect()
            ->route('recording.show', ['id' => $recording_id])
            ->with('feedback.success', 'レビューの投稿に成功しました。');
    }

    public function edit(Request $request)
    {
        $recording_id = $request->get('recording_id');
        $recording = Recording::where('id', $recording_id)->firstOrFail();

        $review = Review::where('user_id', Auth::id())
            ->where('recording_id', $recording_id)
            ->firstOrFail();

        return view('review.edit',
            compact('recording', 'review'));
    }

    public function update(ReviewRequest $request)
    {
        $recording_id = $request->post('recording_id');
        try {
            DB::transaction(function () use ($request, $recording_id) {
                $review = Review::where('user_id', Auth::id())
                    ->where('recording_id', $recording_id)
                    ->firstOrFail();
                $form = $request->all();
                unset($form['_token']);
                // ここではlikeの初期化はしない
                $review->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect()
                ->route('recording.show', ['id' => $recording_id])
                ->with('feedback.error', 'レビューの編集に失敗しました。');
        }

        return redirect()
            ->route('recording.show', ['id' => $recording_id])
            ->with('feedback.success', 'レビューの編集に成功しました。');

    }
}
