<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Follow;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
        $this->fromHomeController = true;
    }

    protected function setUserInfo()
    {
        // TODO: なぜコンストラクタでAuth::user()メソッドを使うとログイン中でもnullを返してしまうのか？
        $this->user = Auth::user();
        $this->allReviewCount = $this->reviewService->getAllReviewCount($this->user);
        $this->reviewCount    = $this->reviewService->getReviewCount($this->user);
        $this->likeSum        = $this->reviewService->getLikeSum($this->user);
    }

    public function index()
    {
        $this->setUserInfo();
        $following_user_reviews = $this->reviewService->getFollowingUserReviews($this->user, 10);

        return view('home.index', [
            'user'                   => $this->user,
            'allReviewCount'         => $this->allReviewCount,
            'reviewCount'            => $this->reviewCount,
            'likeSum'                => $this->likeSum,
            'fromHomeController'     => $this->fromHomeController,
            'following_user_reviews' => $following_user_reviews,
        ]);
    }

    public function following_users()
    {
        $this->setUserInfo();
        $following_users = $this->user->following()->paginate(10);

        return view('home.following_users', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromHomeController' => $this->fromHomeController,
            'following_users'    => $following_users,
        ]);
    }

    public function reviews()
    {
        $this->setUserInfo();
        $reviews = $this->reviewService->getAllReviews($this->user, 10);

        return view('home.reviews', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromHomeController' => $this->fromHomeController,
            'reviews'            => $reviews,
        ]);
    }

    public function edit_profile()
    {
        $this->setUserInfo();

        return view('home.profile', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromHomeController' => $this->fromHomeController,
        ]);
    }
}
