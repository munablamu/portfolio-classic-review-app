<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recording;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRecordingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $recording_ids = Recording::pluck('id')->toArray();

        foreach ( $users as $user ) {
            $num_favorite = rand(0, 10);
            shuffle($recording_ids);
            $favorite_ids = array_slice($recording_ids, 0, $num_favorite);

            foreach ( $favorite_ids as $i_favorite_id ) {
                DB::table('user_recordings')->insert([
                    'user_id' => $user->id,
                    'recording_id' => $i_favorite_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
