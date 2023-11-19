<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $reviewsCount = Review::whereNotNull('title')->count();

        foreach ( $users as $i_user ) {
            $like_ids = Review::whereNotNull('title')
                ->inRandomOrder()
                ->take(rand(0, $reviewsCount))
                ->pluck('id');

            foreach ( $like_ids as $j_like_id ) {
                DB::table('likes')->insert([
                    'user_id' => $i_user->id,
                    'review_id' => $j_like_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
