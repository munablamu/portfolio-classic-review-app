<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Artist;
use App\Models\Review;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q')) ?? '';
        $search_type = $request->get('search_type');

        $route = match($search_type) {
            'music' => 'search.music',
            'artist' => 'search.artist',
            'review' => 'search.review',
            'default' => 'search.review'
        };

        return redirect()->route($route, ['q' => $q]);
    }

    public function music(Request $request)
    {
        $q = trim($request->query('q')) ?? '';
        $musics = Music::search($q)
            ->paginate(10)
            ->appends(['q' => $q, 'query' => null]);

        return view('search.music',
            compact('q', 'musics'));
    }

    public function artist(Request $request)
    {
        $q = trim($request->query('q')) ?? '';
        $artists = Artist::search($q)
            ->paginate(10)
            ->appends(['q' => $q, 'query' => null]);

        return view('search.artist',
            compact('q', 'artists'));
    }

    public function review(Request $request)
    {
        $q = trim($request->query('q')) ?? '';
        $reviews = Review::search($q)
            ->paginate(10)
            ->appends(['q' => $q, 'query' => null]);

        return view('search.review',
            compact('q', 'reviews'));
    }
}
