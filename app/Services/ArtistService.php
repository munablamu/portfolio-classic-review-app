<?php

namespace App\Services;

use App\Models\Artist;

class ArtistService
{
    public function getArtists()
    {
        return Artist::orderBy('name', 'ASC')->get();
    }

    public function search(string $q, int $num_paginate)
    {
        if ( !empty($q) ) {
            $artists = Artist::search($q)
                ->paginate($num_paginate)
                ->appends(['q' => $q, 'query' => null]);
        } else {
            $artists = collect();
        }

        return $artists;
    }
}
