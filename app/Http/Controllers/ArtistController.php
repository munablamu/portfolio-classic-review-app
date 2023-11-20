<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Recording;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::orderBy('name', 'ASC')->get();

        return view('artist.index',
            compact('artists'));
    }

    public function show(Request $request, Artist $artist)
    {
        // $artistと関連するrecordingを検索する
        $recordings = Recording::whereHas('artists', function ($query) use ($artist) {
            $query->where('artists.id', $artist->id);
        })->orderBy('average_rate', 'desc')->paginate(10);

        return view('artist.show',
            compact('artist', 'recordings'));
    }
}
