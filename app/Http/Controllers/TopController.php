<?php

namespace App\Http\Controllers;

use App\Models\Composer;

class TopController extends Controller
{
    public function index()
    {
        $fromTopController = true;

        return view('top.index',
            compact('fromTopController'));
    }

    public function help()
    {
        $composers = Composer::all();

        return view('top.help',
            compact('composers'));
    }
}
