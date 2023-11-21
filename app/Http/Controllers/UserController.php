<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index',
            compact('users'));
    }

    public function show(Request $request, User $user)
    {
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        return view('user.show',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum'));
    }

    public function reviews(Request $request, User $user)
    {
        $user_id = $user->id;

        $allReviewCount = Review::where('user_id', $user_id)->count();
        $reviewCount = Review::where('user_id', $user_id)
            ->whereNotNull('title')->count();

        $likeSum = Review::where('user_id', $user_id)
            ->sum('like');

        $reviews = Review::where('user_id', $user_id)
            ->whereNotNull('title')
            ->orderBy('like', 'desc')
            ->paginate(10);

        return view('user.reviews',
            compact('user', 'allReviewCount', 'reviewCount', 'likeSum', 'reviews'));
    }
}
