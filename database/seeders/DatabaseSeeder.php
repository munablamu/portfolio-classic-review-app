<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            ComposersSeeder::class,
            MusicsSeeder::class,
            ArtistsSeeder::class,
            RecordingsSeeder::class,
            RecordingArtistSeeder::class,
            ReviewsSeeder::class,
            RecordingAverageRateSeeder::class,
            LikesSeeder::class,
            ReviewLikeSeeder::class,
            UserArtistsSeeder::class,
            UserRecordingsSeeder::class,
            FollowsSeeder::class,
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
