<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Services\RecordingService;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function show(Request $request, Music $music, RecordingService $recordingService)
    {
        $orderBy = $request->query('orderBy', 'release_date');

        $recordings = $recordingService->getRecordingsRelatedToMusic($music, 10, $orderBy);

        return view('music.show',
            compact('music', 'recordings'));
    }
}
