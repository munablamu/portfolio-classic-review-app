<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordingArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordings = json_decode(file_get_contents('database/seeders/recordings.json'));

        for ( $i = 0; $i < count($recordings); $i++ ) {
            $recording_id = $i + 1;
            foreach ( $recordings[$i]->artist_ids as $j_artist_id ) {
                DB::table('recording_artist')->insert([
                    'recording_id' => $recording_id,
                    'artist_id' => $j_artist_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
