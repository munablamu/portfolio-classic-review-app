<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')
            ->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        $following_user_id = Follow::where('followed_user_id', $user_id)
            ->pluck('following_user_id');

        $following_user_reviews = Review::whereIn('user_id', $following_user_id)
            ->whereNotNull('title')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        // この書き方(whereHas)は重いらしい。
        // $following_user_reviews = Review::whereHas('user.followers', function ($query) use ($user_id) {
        //     $query->where('followed_user_id', $user_id);
        // })->whereNotNull('title')
        //     ->orderBy('updated_at', 'desc')
        //     ->paginate(10);

        return view('home.index',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'following_user_reviews'));
    }

    public function following_users()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        $following_users = $user->following;

        return view('home.following_users',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'following_users'));
    }

    public function reviews()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        $reviews = Review::where('user_id', $user_id)
            ->paginate(10);

        return view('home.reviews',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'reviews'));
    }

    public function edit_profile()
    {
        $user = Auth::user();
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        return view('home.profile',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum'));
    }
}
