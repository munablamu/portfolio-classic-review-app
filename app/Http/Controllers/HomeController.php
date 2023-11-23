<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Models\Follow;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    protected function getUserInfo(User $user)
    {
        return [
            'allReviewCount' => $this->reviewService->getAllReviewCount($user),
            'reviewCount'    => $this->reviewService->getReviewCount($user),
            'likeSum'        => $this->reviewService->getLikeSum($user),
        ];
    }

    public function index()
    {
        $user = Auth::user();
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        $following_user_reviews = $this->reviewService->getFollowingUserReviews($user, 10);

        return view('home.index',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'following_user_reviews'));
    }

    public function following_users()
    {
        $user = Auth::user();
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        $following_users = $user->following()->paginate(10);

        return view('home.following_users',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'following_users'));
    }

    public function reviews()
    {
        $user = Auth::user();
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        $reviews = $this->reviewService->getAllReviews($user, 10);

        return view('home.reviews',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'reviews'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        return view('home.profile',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum'));
    }
}
