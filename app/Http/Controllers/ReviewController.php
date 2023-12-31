<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Recording;
use App\Services\ReviewService;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    public function show(Review $review)
    {
        $recording = $review->recording;

        return view('review.show',
            compact('review', 'recording'));
    }

    public function create(Request $request, Recording $recording)
    {
        if ( !Session::has('url.reviewCreate') ) {
            Session::put('url.reviewCreate', url()->previous());
        }

        return view('review.create',
            compact('recording'));
    }

    // メソッド内では$recordingは使ってないが、仮引数に書かないとルーティングの関係上
    // ReviewRequestで$this->route('recording')そのものがidの文字列になってしまい他のReviewController
    // のメソッドと整合性が取れなくなってしまう。
    public function store(ReviewRequest $request, Recording $recording, ReviewService $reviewService)
    {
        try {
            $form = $request->all();
            $reviewService->insertReview($form);
        } catch ( \Throwable $e ) {
            \Log::error($e);
            $redirect = redirect(Session::get('url.reviewCreate'));
            Session::forget('url.reviewCreate');
            return $redirect
                ->with('feedback.error', 'レビューの投稿に失敗しました。');
        }

        $redirect = redirect(Session::get('url.reviewCreate'));
        Session::forget('url.reviewCreate');

        return $redirect
            ->with('feedback.success', 'レビューの投稿に成功しました。');
    }

    public function edit(Request $request, Recording $recording, ReviewService $reviewService)
    {
        if ( !Session::has('url.reviewEdit') ) {
            Session::put('url.reviewEdit', url()->previous());
        }

        $review = $reviewService->getReviewRelatedToUserRecording(Auth::user(), $recording);

        return view('review.edit',
            compact('recording', 'review'));
    }

    public function update(ReviewRequest $request, Recording $recording, ReviewService $reviewService)
    {
        try {
            $form = $request->all();
            $reviewService->updateReview(Auth::user(), $recording, $form);
        } catch ( \Throwable $e ) {
            \Log::error($e);
            $redirect = redirect(Session::get('url.reviewEdit'));
            Session::forget('url.reviewEdit');
            return $redirect
                ->with('feedback.error', 'レビューの編集に失敗しました。');
        }

        $redirect = redirect(Session::get('url.reviewEdit'));
        Session::forget('url.reviewEdit');

        return $redirect
            ->with('feedback.success', 'レビューの編集に成功しました。');
    }

    public function delete(Review $review, ReviewService $reviewService)
    {
        $reviewer_id = $review->user_id;

        if ( $reviewer_id === Auth::id() ) {
            try {
                $reviewService->deleteReview($review);
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
