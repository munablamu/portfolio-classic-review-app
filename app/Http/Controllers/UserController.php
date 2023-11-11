<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('user.index',
            compact('users'));
    }

    public function show(Request $request) {
        $user = User::where('id', $request->route('id'))->firstOrFail();
        $user_name = $user->name;
        $reviews = $user->reviews()->orderBy('like', 'desc')->get();

        return view('user.show',
            compact('user_name', 'reviews'));
    }
}
