<?php

namespace App\Services;

use App\Models\User;
use App\Models\Recording;
use App\Models\Review;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    public function getUserReview(Recording $recording)
    {
        $review = Review::where('user_id', Auth::id()) // $user->idだと未ログイン状態でnullにidは無いというエラーが出るため、Auth::id()を使っている
            ->where('recording_id', $recording->id)
            ->first();

        return $review;
    }

    public function getReviewsWithoutUserReview(Recording $recording, int $num_paginate)
    {
        $reviews = Review::where('recording_id', $recording->id)
            ->when(Auth::check(), function ($query) {
                return $query->where('user_id', '!=', Auth::id()); // $user->idだと未ログイン状態でnullにidは無いというエラーが出るため、Auth::id()を使っている
            })
            ->whereNotNull('title')
            ->orderBy('like', 'desc')
            ->paginate(10);

        return $reviews;
    }

    public function getAllReviews(User $user, int $num_paginate)
    {
        return Review::where('user_id', $user->id)->orderBy('updated_at', 'desc')->paginate($num_paginate);
    }

    public function getReviews(User $user, int $num_paginate)
    {
        $reviews = Review::where('user_id', $user->id)
            ->whereNotNull('title')
            ->orderBy('like', 'desc')
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
        unset($form['_token']);
        // TODO: $formからuser_idとrecording_idもunsetしたほうが安全？
        $review = Review::where('user_id', $user->id)
            ->where('recording_id', $recording->id)
            ->firstOrFail();

        // reviewにタイトル、コンテンツがない場合、likeを0に戻す
        if ( $form['title'] === null ) {
            $form['like'] = 0;
        }

        // ユーザーから入力された文字列をエスケープ
        $form['title'] = e($form['title']);
        $form['content'] = e($form['content']);

        $review->fill($form)->save();
    }

    public function insertReview(array $form)
    {
        $review = new Review;
        unset($form['_token']);

        // ユーザーから入力された文字列をエスケープ
        $form['title'] = e($form['title']);
        $form['content'] = e($form['content']);

        $form['like'] = 0;
        $review->fill($form)->save();
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

        $followingUserReviews = Review::whereIn('user_id', $followingUserId)
            ->whereNotNull('title')
            ->orderBy('updated_at', 'desc')
            ->paginate($num_paginate);

        return $followingUserReviews;
    }

    public function search(string $q, int $num_paginate)
    {
        $reviews = Review::search($q)
            ->paginate($num_paginate)
            ->appends(['q' => $q, 'query' => null]);

        return $reviews;
    }
}
