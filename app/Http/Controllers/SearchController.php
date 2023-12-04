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
        $q = trim($request->get('q'));
        $search_type = $request->get('search_type');

        $route = match($search_type) {
            'music' => 'search.music',
            'artist' => 'search.artist',
            'review' => 'search.review',
            default => 'search.review'
        };

        return redirect()->route($route, ['q' => $q, 'oldSearchType' => $search_type]);
    }

    public function music(Request $request, MusicService $musicService)
    {
        $q = trim($request->query('q')) ?? '';
        $musics = $musicService->search($q, 10);

        $oldSearchType = $request->query('oldSearchType');

        $keywords = explode(' ', $q);
        foreach ( $musics as $i_music) {
            foreach ( $keywords as $j_keyword ) {
                $i_music->title = highlightKeyword($i_music->title, $j_keyword);
                $i_music->opus = highlightKeyword($i_music->opus, $j_keyword);
                $i_music->composer->name = highlightKeyword($i_music->composer->name, $j_keyword);
            }
        }

        return view('search.music',
            compact('q', 'musics', 'oldSearchType'));
    }

    public function artist(Request $request, ArtistService $artistService)
    {
        $q = trim($request->query('q')) ?? '';
        $artists = $artistService->search($q, 10);

        $oldSearchType = $request->query('oldSearchType');

        $keywords = explode(' ', $q);
        foreach ( $artists as $i_artist) {
            foreach ( $keywords as $j_keyword ) {
                $i_artist->name = highlightKeyword($i_artist->name, $j_keyword);
            }
        }

        return view('search.artist',
            compact('q', 'artists', 'oldSearchType'));
    }

    public function review(Request $request, ReviewService $reviewService)
    {
        $q = trim($request->query('q')) ?? '';
        $reviews = $reviewService->search($q, 10);

        $oldSearchType = $request->query('oldSearchType');

        $keywords = explode(' ', $q);
        foreach ( $reviews as $i_review) {
            foreach ( $keywords as $j_keyword ) {
                $i_review->title = highlightKeyword($i_review->title, $j_keyword);
                $i_review->content = highlightKeyword($i_review->content, $j_keyword);
                $i_review->content = extractKeywordContext($i_review->content);
            }
        }

        return view('search.review',
            compact('q', 'reviews', 'oldSearchType'));
    }
}
