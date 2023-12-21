<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\UserIconRequest;
use App\Http\Requests\SelfIntroductionRequest;
use App\Modules\ImageUpload\ImageManagerInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct(private ImageManagerInterface $imageManager)
    {
    }

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
        try {
            $request->user()->fill($request->validated());

            if ($request->user()->isDirty('email')) {
                $request->user()->email_verified_at = null;
            }

            $request->user()->save();
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return Redirect::route('home.edit_profile')
                ->with('feedback.error', 'プロフィールの更新に失敗しました。');
        }

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
        return Redirect::route('home.edit_profile')
            ->with('feedback.success', 'プロフィールの更新に成功しました。');
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

        if ( $user->email === 'sample@example.com' ) {
            return Redirect::route('home.edit_profile')
                ->with('feedback.warning', 'サンプルアカウントは削除できません。');
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateUserIcon(UserIconRequest $request)
    {
        try {
            if ( $request->hasFile('user_icon') ) {
                $file = $request->file('user_icon');

                if ( $file->isValid() ) {
                    /* do {
                        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
                    } while ( Storage::exists('public/user_icons/' . $filename) );

                    $file->storeAs('public/user_icons', $filename); */
                    $filename = $this->imageManager->save($file, 'user_icons');

                    $user = Auth::user();
                    $oldUserIconFilename = $user->icon_filename;
                    $user->icon_filename = $filename;

                    if ( $user->save() ) {
                        // TODO: なぜpublic_pathを挟まないとdeleteできないのか？
                        /* $publicPath = public_path('storage/user_icons/' . $oldUserIconFilename);
                        $deleteSuccess = File::delete($publicPath); */
                        $this->imageManager->delete('user_icons/' . $oldUserIconFilename);
                    }
                }
            }
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return Redirect::route('home.edit_profile')
                ->with('feedback.error', 'ユーザーアイコンの更新に失敗しました。');
        }

        return Redirect::route('home.edit_profile')
            ->with('feedback.success', 'ユーザーアイコンの更新に成功しました。');
    }

    public function updateSelfIntroduction(SelfIntroductionRequest $request)
    {
        try {
            $selfIntroduction = $request->post('self_introduction');

            $user = Auth::user();
            $user->self_introduction = $selfIntroduction;
            $user->save();
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return Redirect::route('home.edit_profile')
                ->with('feedback.error', '自己紹介の更新に失敗しました。');
        }

        return Redirect::route('home.edit_profile')
            ->with('feedback.success', '自己紹介の更新に成功しました。');
    }
}
