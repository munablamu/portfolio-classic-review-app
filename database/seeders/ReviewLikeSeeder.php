<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = Review::all();

        foreach ( $reviews as $i_review ) {
            $like_count = Like::where('review_id', $i_review->id)->count();
            $i_review->update([
                'like' => $like_count,
            ]);
        }
    }
}
