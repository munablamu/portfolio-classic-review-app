<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ( $users as $user ) {
            $favorite_ids = Artist::inRandomOrder()
                ->take(rand(0, 10))
                ->pluck('id');

            foreach ( $favorite_ids as $i_favorite_id ) {
                DB::table('user_artists')->insert([
                    'user_id' => $user->id,
                    'artist_id' => $i_favorite_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
