<?php

namespace App\Http\Controllers;

use App\Models\Composer;
use App\Models\Music;
use App\Http\Requests\MusicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MusicController extends Controller
{
    public function index()
    {
        $composers = Composer::all();
        $musics = Music::all();

        return view('music.index',
            compact('composers', 'musics'));
    }

    public function store(MusicRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $music = new Music;
                $form = $request->all();
                unset($form['_token']);
                $music->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect()
                ->route('music')
                ->with('feedback.error', '曲の追加に失敗しました。');
        }

        return redirect()
            ->route('music')
            ->with('feedback.success', '曲の追加に成功しました。');
    }

    public function edit($id)
    {
        $composers = Composer::all();
        $music = Music::where('id', $id)->firstOrFail();

        return view('music.edit',
            compact('composers', 'music'));
    }

    public function update(MusicRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $music = Music::where('id', $request->route('id'))->firstOrFail();
                $form = $request->all();
                unset($form['_token']);
                $music->fill($form)->save();
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect()
                ->route('music')
                ->with('feedback.error', '曲の編集に失敗しました。');
        }

        return redirect()
            ->route('music')
            ->with('feedback.success', '曲の編集に成功しました。');
    }

    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                Music::destroy($id);
            });
        } catch ( \Throwable $e ) {
            \Log::error($e);
            return redirect()
                ->route('music')
                ->with('feedback.error', '曲の削除に失敗しました。');
        }

        return redirect()
            ->route('music')
            ->with('feedback.success', '曲の削除に成功しました。');
    }
}
