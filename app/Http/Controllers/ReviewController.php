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
    public function create(Request $request, Recording $recording)
    {
        Session::flash('url.reviewCreate', url()->previous());

        return view('review.create',
            compact('recording'));
    }

    // TODO: メソッド内では$recordingは使ってないが、仮引数に書かないとルーティングの関係上ReviewRequestで$this->route('recording')そのものがidの文字列になってしまい他のReviewControllerのメソッドと整合性が取れなくなってしまう。
    public function store(ReviewRequest $request, Recording $recording, ReviewService $reviewService)
    {
        try {
            $form = $request->all();
            $reviewService->insertReview($form);
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect(Session::get('url.reviewCreate'))
                ->with('feedback.error', 'レビューの投稿に失敗しました。');
        }

        return redirect(Session::get('url.reviewCreate'))
            ->with('feedback.success', 'レビューの投稿に成功しました。');
    }

    public function edit(Request $request, Recording $recording, ReviewService $reviewService)
    {
        Session::flash('url.reviewEdit', url()->previous());
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
            return redirect(Session::get('url.reviewEdit'))
                ->with('feedback.error', 'レビューの編集に失敗しました。');
        }

        return redirect(Session::get('url.reviewEdit'))
            ->with('feedback.success', 'レビューの編集に成功しました。');
    }

    public function delete(Request $request, Review $review)
    {
        $reviewer_id = $review->user_id;
        // routingでauth middlewareを使っているからAuth::check()は不要？
        if ( Auth::check() && $reviewer_id === Auth::id() ) {
            try {
                $review->delete();
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
