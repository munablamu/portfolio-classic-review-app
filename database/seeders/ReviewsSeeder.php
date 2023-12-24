<?php

namespace Database\Seeders;

use \DateTime;
use \DateTimeZone;
use App\Models\Recording;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ja_JP');
        $recordings = Recording::all();
        $reviews = json_decode(file_get_contents('database/seeders/reviews.json'));

        foreach ( $reviews as $i_review ) {
            DB::table('reviews')->insert([
                'user_id' => $i_review->user_id,
                'recording_id' => $i_review->recording_id,
                'title' => $i_review->title,
                'content' => $i_review->content,
                'rate' => $i_review->rate,
                'like' => $i_review->like,
                'created_at' => new DateTime($i_review->created_at->date, new DateTimeZone($i_review->created_at->timezone)),
                'updated_at' => new DateTime($i_review->updated_at->date, new DateTimeZone($i_review->updated_at->timezone)),
            ]);
        }
    }
}
