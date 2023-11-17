<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Recording;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordingController extends Controller
{
    public function index(Request $request)
    {
        if ( $request->has('music_id') ) {
            $music_id = $request->query('music_id');
            $music = Music::where('id', $music_id)->firstOrFail();
            $recordings = Recording::where('music_id', $music_id)
                ->orderBy('average_rate', 'desc')
                ->paginate(10)
                ->appends(['music_id' => $music_id]);
        } else {
            //
        }

        return view('recording.index',
            compact('music', 'recordings'));
    }

    public function show(Request $request)
    {
        $recording_id = $request->route('id');
        $recording = Recording::where('id', $recording_id)->firstOrFail();

        $user_review = Review::where('user_id', Auth::id())
            ->where('recording_id', $recording_id)->first();
        if ( Auth::check() ) {
            $reviews = Review::where('recording_id', $recording_id)
                ->where('user_id', '!=', Auth::id())
                ->whereNotNull('title')
                ->orderBy('like', 'desc')
                ->paginate(10);
        } else {
            $reviews = Review::where('recording_id', $recording_id)
                ->whereNotNull('title')
                ->orderBy('like', 'desc')
                ->paginate(10);
        }

        return view('recording.show',
            compact('recording', 'user_review', 'reviews'));
    }
}
