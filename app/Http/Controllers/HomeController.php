<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $reviewService;
    protected $fromHomeController;
    protected $user;
    protected $allReviewCount;
    protected $reviewCount;
    protected $likeSum;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
        $this->fromHomeController = true;
    }

    protected function setUserInfo()
    {
        // 標準的なLaravelの挙動では、コンストラクタが実行される段階ではまだミドルウェア郡が実行されていないため、
        // コンストラクタ内でAuth::user()を実行するとnullを返してしまうため、個々に記述して各メソッド内で適宜実行することにする。
        $this->user = Auth::user();
        $this->allReviewCount = $this->reviewService->getAllReviewCount($this->user);
        $this->reviewCount    = $this->reviewService->getReviewCount($this->user);
        $this->likeSum        = $this->reviewService->getLikeSum($this->user);
    }

    public function index()
    {
        $this->setUserInfo();
        $followingUserReviews = $this->reviewService->getFollowingUserReviews($this->user, 10);

        return view('home.index', [
            'user'                   => $this->user,
            'allReviewCount'         => $this->allReviewCount,
            'reviewCount'            => $this->reviewCount,
            'likeSum'                => $this->likeSum,
            'fromHomeController'     => $this->fromHomeController,
            'following_user_reviews' => $followingUserReviews,
        ]);
    }

    public function following_users()
    {
        $this->setUserInfo();
        $followingUsers = $this->user->following()->paginate(10);

        return view('home.following_users', [
            'user'               => $this->user,
            'allReviewCount'     => $this->allReviewCount,
            'reviewCount'        => $this->reviewCount,
            'likeSum'            => $this->likeSum,
            'fromHomeController' => $this->fromHomeController,
            'following_users'    => $followingUsers,
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
