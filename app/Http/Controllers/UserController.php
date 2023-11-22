<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    // TODO: HomeControllerのgetUserInfoメソッドをヘルパー関数にして共用したほうがいい
    protected function getUserInfo(User $user)
    {
        return [
            'allReviewCount' => $this->reviewService->getAllReviewCount($user),
            'reviewCount'    => $this->reviewService->getReviewCount($user),
            'likeSum'        => $this->reviewService->getLikeSum($user),
        ];
    }

    public function index(UserService $userService)
    {
        $users = $userService->getUsers();

        return view('user.index',
            compact('users'));
    }

    public function show(User $user)
    {
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        return view('user.show',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum'));
    }

    public function reviews(Request $request, User $user)
    {
        ['allReviewCount' => $allReviewCount, 'reviewCount' => $reviewCount, 'likeSum' => $likeSum]
            = $this->getUserInfo($user);

        $reviews = $this->reviewService->getReviews($user, 10);

        return view('user.reviews',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'reviews'));
    }
}
