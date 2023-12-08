<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function set(Request $request)
    {
        // TODO: もしかしてサーバーサイドでのテーマ設定保存は必要ないかも
        $request->session()->put('theme', $request->input('theme'));
        return response()->json(['status' => 'success']);
    }
}
