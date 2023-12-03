<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Recording;
use App\Models\Review;
use App\Services\MusicService;
use App\Services\RecordingService;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordingController extends Controller
{
    public function show(Request $request, Recording $recording, ReviewService $reviewService)
    {
        $orderBy = $request->query('orderBy');

        $user_review = $reviewService->getUserReview($recording);
        $reviews = $reviewService->getReviewsWithoutUserReview($recording, 5, $orderBy);

        return view('recording.show',
            compact('recording', 'user_review', 'reviews'));
    }
}
