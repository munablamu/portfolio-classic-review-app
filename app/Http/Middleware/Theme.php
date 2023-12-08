<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Theme
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('theme')) {
            $request->validate([
                'theme' => 'required|in:dark,light',
            ]);

            $request->session()->put('theme', $request->theme);
        }

        return $next($request);
    }
}
