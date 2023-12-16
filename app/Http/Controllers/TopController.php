<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('top.help');
    }
}
