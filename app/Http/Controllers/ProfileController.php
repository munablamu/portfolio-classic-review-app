<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateUserIcon(Request $request)
    {
        if ( $request->hasFile('user_icon') ) {
            $file = $request->file('user_icon');

            if ( $file->isValid() ) {
                do {
                    $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                } while ( Storage::exists('public/user_icons/' . $filename) );

                $file->storeAs('public/user_icons', $filename);

                $user = Auth::user();
                $oldUserIconFilename = $user->icon_filename;
                $user->icon_filename = $filename;

                if ( $user->save() ) {
                    // TODO: なぜpublic_pathを挟まないとdeleteできないのか？
                    $publicPath = public_path('storage/user_icons/' . $oldUserIconFilename);
                    $deleteSuccess = File::delete($publicPath);
                }
            }
        }

        return redirect()->route('home.edit_profile');
    }

    public function updateSelfIntroduction(Request $request)
    {
        $selfIntroduction = $request->post('self_introduction');

        $user = Auth::user();
        $user->self_introduction = $selfIntroduction;
        $user->save();

        return redirect()->route('home.edit_profile');
    }
}
