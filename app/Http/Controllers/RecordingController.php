<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Recording;
use Illuminate\Http\Request;

class RecordingController extends Controller
{
    public function index(Request $request)
    {
        if ( $request->has('music_id') ) {
            $music = Music::where('id', $request->query('music_id'))->firstOrFail();
            $composer = $music->composer->name;
            $title = $music->title;
            $opus = $music->opus;
            $recordings = Recording::where('music_id', $request->query('music_id'))->get();
        } else {
            $recordings = Recording::all();
        }

        return view('recording.index',
            compact('composer', 'title', 'opus', 'recordings'));
    }
}
