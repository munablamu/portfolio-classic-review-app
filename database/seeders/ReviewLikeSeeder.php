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
            $likeCount = Like::where('review_id', $i_review->id)->count();
            $datetime = $i_review->updated_at;
            // ReviewsSeederで設定したランダムなtimestampsを更新しないように、DB:tableメソッドを使用してreviewsテーブルに直接アクセスする。
            DB::table('reviews')
                ->where('id', $i_review->id)
                ->update([
                    'like' => $likeCount,
                    'updated_at' => $datetime,
            ]);
        }
    }
}
