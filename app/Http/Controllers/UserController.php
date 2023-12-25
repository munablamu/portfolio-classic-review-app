<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $reviewService;
    protected $fromUserController;
    protected $user;
    protected $allReviewCount;
    protected $reviewCount;
    protected $likeSum;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
        $this->fromUserController = true;
    }

    protected function setUserInfo(User $user)
    {
        // HomeControllerと構造を一致させるのため
        $this->user = $user;
        $this->allReviewCount = $this->reviewService->getAllReviewCount($this->user);
        $this->reviewCount    = $this->reviewService->getReviewCount($this->user);
        $this->likeSum        = $this->reviewService->getLikeSum($this->user);
    }

    public function show(User $user)
    {
        $this->setUserInfo($user);

        return view('user.show', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromUserController' => $this->fromUserController,
        ]);
    }

    public function reviews(Request $request, User $user)
    {
        $this->setUserInfo($user);

        $orderBy = $request->query('orderBy', 'like');
        $reviews = $this->reviewService->getReviews($user, 10, $orderBy);

        return view('user.reviews', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromUserController' => $this->fromUserController,
            'reviews'            => $reviews,
        ]);
    }

    public function follows(User $user)
    {
        $this->setUserInfo($user);
        $follows = $user->following()->paginate(10);

        return view('user.follows', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromUserController' => $this->fromUserController,
            'follows'            => $follows,
        ]);
    }

    public function followers(User $user)
    {
        $this->setUserInfo($user);
        $followers = $user->followers()->paginate(10);

        return view('user.followers', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromUserController' => $this->fromUserController,
            'followers'          => $followers,
        ]);
    }
}
