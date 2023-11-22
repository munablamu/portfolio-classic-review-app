<?php

namespace App\Services;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Recording;

class RecordingService
{
    public function getRecordingsRelatedToArtist(Artist $artist, int $num_paginate)
    {
        // TODO: これpaginateのpageクエリパラメータ大丈夫？
        $recordings = Recording::whereHas('artists', function ($query) use ($artist) {
            $query->where('artists.id', $artist->id);
            })->orderBy('average_rate', 'desc')
            ->paginate($num_paginate);

        return $recordings;
    }

    public function getRecordingsRelatedToMusic(Music $music, int $num_paginate)
    {
        $recordings = Recording::where('music_id', $music->id)
            ->orderBy('average_rate', 'desc')
            ->paginate($num_paginate)
            ->appends(['music_id' => $music->id]);

        return $recordings;
    }
}
