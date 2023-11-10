<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecordingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordings = json_decode(file_get_contents('database/seeders/recordings.json'));

        foreach ( $recordings as $i_recording ) {
            DB::table('recordings')->insert([
                'music_id' => $i_recording->music_id,
                'title' => $i_recording->title,
                'release_date' => $i_recording->release_date !== null ? Carbon::createFromTimestampMs($i_recording->release_date) : null,
                'catalogue_no' => $i_recording->catalogue_no,
                'jacket_filename' => $i_recording->jacket_filename,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
