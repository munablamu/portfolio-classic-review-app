<?php

namespace App\Http\Controllers;

use App\Models\Recording;
use App\Services\ReviewService;
use Illuminate\Http\Request;

class RecordingController extends Controller
{
    public function show(Request $request, Recording $recording, ReviewService $reviewService)
    {
        $orderBy = $request->query('orderBy', 'like');

        $user_review = $reviewService->getUserReview($recording);
        $reviews = $reviewService->getReviewsWithoutUserReview($recording, 5, $orderBy);

        return view('recording.show',
            compact('recording', 'user_review', 'reviews'));
    }
}
