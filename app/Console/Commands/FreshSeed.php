<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FreshSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fresh-seed {--scout=} {--cloudinary}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeding and related processing';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:fresh --force --seed');

        $scout_string = $this->option('scout');
        $scouts = explode(',', $scout_string);
        foreach ( $scouts as $i_scout ) {
            Artisan::call("scout:flush 'App\\Models\\{$i_scout}'");
            Artisan::call("scout:import 'App\\Models\\{$i_scout}'");
        }

        $cloudinary = $this->option('cloudinary');
        if ( $cloudinary ) {
            Artisan::call('app:upload-to-cloudinary');
        }
    }
}
