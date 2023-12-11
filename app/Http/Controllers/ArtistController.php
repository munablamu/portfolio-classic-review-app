<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Recording;
use App\Services\ArtistService;
use App\Services\RecordingService;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // public function index(ArtistService $artistService)
    // {
    //     $artists = $artistService->getArtists();

    //     return view('artist.index',
    //         compact('artists'));
    // }

    public function show(Request $request, Artist $artist, RecordingService $recordingService)
    {
        $orderBy = $request->query('orderBy', 'release_date');

        // $artistと関連するrecordingを検索する(RecordingとArtistは中間テーブルを介して関連付けられているので、whereInで書き換えることができない。)
        $recordings = $recordingService->getRecordingsRelatedToArtist($artist, 10, $orderBy);

        return view('artist.show',
            compact('artist', 'recordings'));
    }
}
