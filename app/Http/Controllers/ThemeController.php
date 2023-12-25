<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function set(Request $request)
    {
        $request->session()->put('theme', $request->input('theme'));
        return response()->json(['status' => 'success']);
    }
}
