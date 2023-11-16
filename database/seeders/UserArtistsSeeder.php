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
        $artist_ids = Artist::pluck('id')->toArray();

        foreach ( $users as $user ) {
            $num_favorite = rand(0, 10);
            shuffle($artist_ids);
            $favorite_ids = array_slice($artist_ids, 0, $num_favorite);

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
