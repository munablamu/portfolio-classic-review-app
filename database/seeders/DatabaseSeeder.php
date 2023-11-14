<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Recording;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        $this->call([
            ComposersSeeder::class,
            MusicsSeeder::class,
            ArtistsSeeder::class,
            RecordingsSeeder::class,
            RecordingArtistSeeder::class,
            ReviewsSeeder::class
        ]);

        // reviewを作ってから出ないとrecording->average_rateを計算できないため
        $recordings = Recording::all();
        foreach ( $recordings as $i_recording ) {
            $i_recording->setAverageRate();
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
