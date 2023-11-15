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
            $composer = $music->composer->name;
            $title = $music->title;
            $opus = $music->opus;
            $recordings = Recording::where('music_id', $music_id)
                ->orderBy('average_rate', 'desc')
                ->paginate(10)
                ->appends(['music_id' => $music_id]);
        } else {
            //
        }

        return view('recording.index',
            compact('composer', 'title', 'opus', 'recordings'));
    }

    public function show(Request $request)
    {
        $recording_id = $request->route('id');
        $recording = Recording::where('id', $recording_id)->firstOrFail();
        $title = $recording->title;
        $release_date = $recording->release_date;
        if ( $release_date !== null ) {
            $release_date = $release_date->format('Y年m月d日');
        } else {
            $release_date = 'unknown';
        }

        $catalogue_no = $recording->catalogue_no;
        $jacket_filename = $recording->jacket_filename;
        $artists = $recording->artists;
        $average_rate = $recording->average_rate;

        if ( Auth::check() ) {
            $user_review = Review::where('user_id', Auth::id())
                ->where('recording_id', $recording_id)->firstOrFail();

            $reviews = Review::where('recording_id', $recording_id)
                ->where('user_id', '<>', Auth::id())
                ->whereNotNull('title')
                ->orderBy('like', 'desc')
                ->paginate(10);
        } else {
            $user_review = null;
            $reviews = Review::where('recording_id', $recording_id)
                ->whereNotNull('title')
                ->orderBy('like', 'desc')
                ->paginate(10);
        }

        return view('recording.show',
            compact('recording_id', 'title', 'release_date', 'catalogue_no', 'jacket_filename',
                    'artists', 'average_rate', 'user_review', 'reviews'));
    }
}
