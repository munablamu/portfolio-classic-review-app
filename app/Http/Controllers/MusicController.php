<?php

namespace App\Http\Controllers;

use App\Models\Composer;
use App\Models\Music;
use App\Services\RecordingService;
use App\Http\Requests\MusicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MusicController extends Controller
{
    public function show(Music $music, RecordingService $recordingService)
    {
        $recordings = $recordingService->getRecordingsRelatedToMusic($music, 10);

        return view('music.show',
            compact('music', 'recordings'));
    }

    // public function index()
    // {
    //     $composers = Composer::all();
    //     $musics = Music::all();

    //     return view('music.index',
    //         compact('composers', 'musics'));
    // }

    // public function search(Request $request) {
    //     $composers = Composer::all();
    //     $musics = Music::search(trim($request->query('q')) ?? '')
    //         ->query(function ($query) {
    //             $query->orderBy('musics.id', 'asc');
    //          })
    //         ->get();

    //     return view('music.index',
    //         compact('composers', 'musics'));
    // }

    // public function store(MusicRequest $request)
    // {
    //     try {
    //         DB::transaction(function () use ($request) {
    //             $music = new Music;
    //             $form = $request->all();
    //             unset($form['_token']);
    //             $music->fill($form)->save();
    //         });
    //     } catch ( \Throwable $e ) {
    //         \Log::error($e);
    //         return redirect()
    //             ->route('music')
    //             ->with('feedback.error', '曲の追加に失敗しました。');
    //     }

    //     return redirect()
    //         ->route('music')
    //         ->with('feedback.success', '曲の追加に成功しました。');
    // }

    // public function edit(Music $music)
    // {
    //     $composers = Composer::all();

    //     return view('music.edit',
    //         compact('composers', 'music'));
    // }

    // public function update(MusicRequest $request, Music $music)
    // {
    //     try {
    //         DB::transaction(function () use ($request, $music) {
    //             $form = $request->all();
    //             unset($form['_token']);
    //             $music->fill($form)->save();
    //         });
    //     } catch ( \Throwable $e ) {
    //         \Log::error($e);
    //         return redirect()
    //             ->route('music')
    //             ->with('feedback.error', '曲の編集に失敗しました。');
    //     }

    //     return redirect()
    //         ->route('music')
    //         ->with('feedback.success', '曲の編集に成功しました。');
    // }

    // public function delete($music)
    // {
    //     try {
    //         DB::transaction(function () use ($music) {
    //             $music->delete();
    //         });
    //     } catch ( \Throwable $e ) {
    //         \Log::error($e);
    //         return redirect()
    //             ->route('music')
    //             ->with('feedback.error', '曲の削除に失敗しました。');
    //     }

    //     return redirect()
    //         ->route('music')
    //         ->with('feedback.success', '曲の削除に成功しました。');
    // }
}
