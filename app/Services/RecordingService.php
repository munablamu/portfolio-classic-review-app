<?php

namespace App\Services;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Recording;

class RecordingService
{
    public function getRecordingsRelatedToArtist(Artist $artist, int $num_paginate, ?string $orderBy)
    {
        $orderBy = match($orderBy) {
            'release_date' => 'release_date',
            'average_rate' => 'average_rate',
            default => 'release_date'
        };

        // TODO: これpaginateのpageクエリパラメータ大丈夫？
        $recordings = Recording::whereHas('artists', function ($query) use ($artist) {
            $query->where('artists.id', $artist->id);
            })->orderBy($orderBy, 'desc')
            ->paginate($num_paginate);

        return $recordings;
    }

    public function getRecordingsRelatedToMusic(Music $music, int $num_paginate)
    {
        $recordings = Recording::where('music_id', $music->id)
            ->orderBy('average_rate', 'desc')
            ->paginate($num_paginate);

        return $recordings;
    }
}
