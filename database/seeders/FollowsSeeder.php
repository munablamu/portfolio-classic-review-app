<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ( $users as $i_user ) {
            $followIds = User::where('id', '!=', $i_user->id)
                ->inRandomOrder()
                ->take(rand(0, 10))
                ->pluck('id');

            foreach ( $followIds as $j_followId ) {
                DB::table('follows')->insert([
                    'followed_user_id' => $i_user->id,
                    'following_user_id' => $j_followId,
                ]);
            }
        }
    }
}
