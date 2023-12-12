<?php

namespace App\Services;

use App\Models\Music;

class MusicService
{
    public function getMusic(int $id)
    {
        return Music::find($id)->firstOrFail();
    }

    public function search(string $q, int $num_paginate)
    {
        if ( !empty($q) ) {
            $musics = Music::search($q)
                ->paginate($num_paginate)
                ->appends(['q' => $q, 'query' => null]);
        } else {
            $musics = collect();
        }

        return $musics;
    }
}
