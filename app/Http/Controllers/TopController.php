<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function __invoke()
    {
        $fromTopController = true;

        return view('top.index',
            compact('fromTopController'));
    }
}
