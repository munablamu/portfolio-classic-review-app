<?php

namespace App\Services;

use App\Models\User;
use App\Models\Recording;
use App\Models\Review;
use App\Models\Follow;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewService
{
    public function getUserReview(Recording $recording)
    {
        $review = Review::where('user_id', Auth::id()) // $user->idだと未ログイン状態でnullにidは無いというエラーが出るため、Auth::id()を使っている
            ->where('recording_id', $recording->id)
            ->first();

        return $review;
    }

    public function getReviewsWithoutUserReview(Recording $recording, int $num_paginate, ?string $orderBy)
    {
        $orderBy = match($orderBy) {
            'like' => 'like',
            'rate' => 'rate',
            'updated_at' => 'updated_at',
            default => 'like'
        };

        $reviews = Review::with('user')
            ->where('recording_id', $recording->id)
            ->when(Auth::check(), function ($query) {
                return $query->where('user_id', '!=', Auth::id()); // $user->idだと未ログイン状態でnullにidは無いというエラーが出るため、Auth::id()を使っている
            })
            ->whereNotNull('title')
            ->orderBy($orderBy, 'desc')
            ->paginate($num_paginate);

        return $reviews;
    }

    public function getAllReviews(User $user, int $num_paginate)
    {
        return Review::with(['user', 'recording'])->where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate($num_paginate);
    }

    public function getReviews(User $user, int $num_paginate, ?string $orderBy)
    {
        $orderBy = match($orderBy) {
            'like' => 'like',
            'rate' => 'rate',
            'updated_at' => 'updated_at',
            default => 'like'
        };

        $reviews = Review::with('recording')
            ->where('user_id', $user->id)
            ->whereNotNull('title')
            ->orderBy($orderBy, 'desc')
            ->paginate($num_paginate);

        return $reviews;
    }

    public function getReviewRelatedToUserRecording(User $user, Recording $recording)
    {
        $review = Review::where('user_id', $user->id)
            ->where('recording_id', $recording->id)
            ->firstOrFail();

        return $review;
    }

    public function updateReview(User $user, Recording $recording, Array $form)
    {
        DB::transaction(function () use ($user, $recording, $form) {
            unset($form['_token'], $form['user_id'], $form['recording_id']);
            $review = Review::where('user_id', $user->id)
                ->where('recording_id', $recording->id)
                ->firstOrFail();

            // reviewにタイトル、コンテンツがない場合、likeを0に戻す
            if ( $form['title'] === null ) {
                $form['like'] = 0;
                Like::where('review_id', $review->id)->delete();
            }

            // nullはe関数によって空文字に変換されてしまい、ReviewService中のwhereNotNull('title')で弾かれなくなってしまうので nullかどうかを判定している
            if ( $form['title'] !== null ) {
                // ユーザーから入力された文字列をエスケープ
                // (レビュー検索の結果表示の際に検索キーワードにstrongしてbladeテンプレート上で{!! !!}で表示するため)
                $form['title'] = e($form['title']);
                $form['content'] = e($form['content']);
            }

            $review->fill($form)->save();

            // recordingの平均評価を更新
            $review->recording->timestamps = false;
            $review->recording->setAverageRate();
            $review->recording->timestamps = true;
        });
    }

    public function insertReview(array $form)
    {
        DB::transaction(function () use ($form) {
            $review = new Review;
            unset($form['_token']);

            // nullはe関数によって空文字に変換されてしまい、ReviewService中のwhereNotNull('title')で弾かれなくなってしまうので nullかどうかを判定している
            if ( $form['title'] !== null ) {
                // ユーザーから入力された文字列をエスケープ
                // (レビュー検索の結果表示の際に検索キーワードにstrongしてbladeテンプレート上で{!! !!}で表示するため)
                $form['title'] = e($form['title']);
                $form['content'] = e($form['content']);
            }

            $form['like'] = 0;
            $review->fill($form)->save();

            // recordingの平均評価を更新
            $review->recording->timestamps = false;
            $review->recording->setAverageRate();
            $review->recording->timestamps = true;
        });
    }

    public function deleteReview(Review $review)
    {
        DB::transaction(function () use ($review) {
            $recording = $review->recording;
            $review->delete();

            // recordingの平均評価を更新
            $recording->timestamps = false;
            $recording->setAverageRate();
            $recording->timestamps = true;
        });
    }

    public function getAllReviewCount(User $user)
    {
        return Review::where('user_id', $user->id)->count();
    }

    public function getReviewCount(User $user)
    {
        $reviewCount = Review::where('user_id', $user->id)
            ->whereNotNull('title')
            ->count();

        return $reviewCount;
    }

    public function getLikeSum(User $user)
    {
        return Review::where('user_id', $user->id)->sum('like');
    }

    public function getFollowingUserReviews(User $user, int $num_paginate)
    {
        // この書き方(whereHas)は重いらしい。
        // $following_user_reviews = Review::whereHas('user.followers', function ($query) use ($user_id) {
        //     $query->where('followed_user_id', $user_id);
        // })->whereNotNull('title')
        //     ->orderBy('updated_at', 'desc')
        //     ->paginate(10);

        $followingUserId = Follow::where('followed_user_id', $user->id)
            ->pluck('following_user_id');

        $followingUserReviews = Review::with(['user', 'recording'])
            ->whereIn('user_id', $followingUserId)
            ->whereNotNull('title')
            ->orderBy('updated_at', 'desc')
            ->paginate($num_paginate);

        return $followingUserReviews;
    }

    public function search(string $q, int $num_paginate)
    {
        if ( !empty($q) ) {
            $reviews = Review::with('user')
                ->whereIn('id', Review::search($q)->keys())
                ->paginate($num_paginate)
                ->appends(['q' => $q, 'query' => null]);
        } else {
            $reviews = collect();
        }

        return $reviews;
    }
}
