<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Recording;
use App\Models\Review;
use Illuminate\Http\Request;

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
            $recordings = Recording::where('music_id', $music_id)->get();
        } else {
            $recordings = Recording::all();
        }

        return view('recording.index',
            compact('composer', 'title', 'opus', 'recordings'));
    }

    public function show(Request $request)
    {
        $recording = Recording::where('id', $request->route('id'))->firstOrFail();
        $title = $recording->title;
        $release_date = $recording->release_date->format('Y年m月d日');
        $catalogue_no = $recording->catalogue_no;
        $jacket_filename = $recording->jacket_filename;
        $artists = $recording->artists;
        $reviews = Review::where('recording_id', $recording->id)
            ->whereNotNull('title')
            ->paginate(10);

        return view('recording.show',
            compact('title', 'release_date', 'catalogue_no', 'jacket_filename', 'artists', 'reviews'));
    }
}
