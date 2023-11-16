<?php

namespace Database\Seeders;

use App\Models\Recording;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecordingAverageRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recordings = Recording::all();
        foreach ( $recordings as $i_recording ) {
            $i_recording->setAverageRate();
        }
    }
}
