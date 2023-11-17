<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
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
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        $following_user_reviews = $user
            ->following()
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->whereNotNull('reviews.title')
            ->orderBy('reviews.updated_at', 'desc')
            ->paginate(10);

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
