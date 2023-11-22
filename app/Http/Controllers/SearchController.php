<?php

namespace App\Http\Controllers;

use App\Services\MusicService;
use App\Services\ArtistService;
use App\Services\ReviewService;
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

    public function music(Request $request, MusicService $musicService)
    {
        $q = trim($request->query('q')) ?? '';
        $musics = $musicService->search($q, 10);

        return view('search.music',
            compact('q', 'musics'));
    }

    public function artist(Request $request, ArtistService $artistService)
    {
        $q = trim($request->query('q')) ?? '';
        $artists = $artistService->search($q, 10);

        return view('search.artist',
            compact('q', 'artists'));
    }

    public function review(Request $request, ReviewService $reviewService)
    {
        $q = trim($request->query('q')) ?? '';
        $reviews = $reviewService->search($q, 10);

        return view('search.review',
            compact('q', 'reviews'));
    }
}
