<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReduceRecordings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reduce-recordings {--max=15} {--min=3}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reduce recording data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $recordings = json_decode(file_get_contents('database/seeders/recordings.json'));
        $reduced_recordings = [];

        $divide = (int) $this->option('max') - (int) $this->option('min');
        $min = (int) $this->option('min');

        $now_music_id = 0;
        $j = 0;
        foreach ( $recordings as $i_recording ) {
            if ( $now_music_id !== (int) $i_recording->music_id ) {
                $now_music_id = $i_recording->music_id;
                $j = 0;
                $num_recordings_per_music = $now_music_id % $divide + $min;
            }

            if ( $j <= $num_recordings_per_music ) {
                $reduced_recordings[] = $i_recording;
            }
            $j++;
        }

        $json_recordings = json_encode($reduced_recordings, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents('database/seeders/recordings_reduction.json', $json_recordings);
    }
}
