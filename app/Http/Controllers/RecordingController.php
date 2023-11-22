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
    public function index(Request $request, MusicService $musicService, RecordingService $recordingService)
    {
        if ( $request->has('music_id') ) {
            $music_id = $request->query('music_id');
            $music = $musicService->getMusic($music_id);
            $recordings = $recordingService->getRecordingsRelatedToMusic($music, 10);
        } else {
            //
        }

        return view('recording.index',
            compact('music', 'recordings'));
    }

    public function show(Request $request, Recording $recording, ReviewService $reviewService)
    {
        $user_review = $reviewService->getUserReview($recording);
        $reviews = $reviewService->getReviewsWithoutUserReview($recording, 10);

        return view('recording.show',
            compact('recording', 'user_review', 'reviews'));
    }
}
