<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::orderBy('name', 'ASC')->get();

        return view('artist.index',
            compact('artists'));
    }

    public function show(Request $request)
    {
        $artist = Artist::where('id', $request->route('id'))->firstOrFail();
        $artist_name = $artist->name;
        $recordings = $artist->recordings->unique();

        return view('artist.show',
            compact('artist_name', 'recordings'));
    }
}
