<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://classicalmusiconly.com/list/100-greatest-classical-music-works-f164de5b から引用
        $musics = json_decode(file_get_contents('database/seeders/musics.json'));

        foreach ( $musics as $i_music ) {
            DB::table('musics')->insert([
                'title' => $i_music->title,
                'opus' => $i_music->opus,
                'composer_id' => $i_music->composer_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
