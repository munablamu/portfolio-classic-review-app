<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Factory as Faker;

class CreateReviewsJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-reviews-json {--users=41} {--reviews=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create reviews json file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $num_users = $this->option('users');
        $num_review_per_recording = $this->option('reviews');

        $faker = Faker::create('ja_JP');
        $reviews = [];
        $user_ids = range(1, $num_users);

        $json_recordings = file_get_contents('database/seeders/recordings_reduction.json');
        $array_recordings = json_decode($json_recordings, true);
        $recording_ids = range(1, count($array_recordings));


        foreach ( $recording_ids as $i_recording_id ) {
            shuffle($user_ids);
            $chosen_user_ids = array_slice($user_ids, 0, $num_review_per_recording);

            $num_review_with_title = $i_recording_id % $num_review_per_recording;
            for ( $j = 0; $j < $num_review_with_title; $j++ ) {
                $randomDateTime = $faker->dateTimeBetween($startDate='-3 year', $endDate='now');
                $reviews[] = [
                    'user_id' => $chosen_user_ids[$j],
                    'recording_id' => $i_recording_id,
                    'title' => $faker->realText(rand(10, 20)),
                    'content' => $faker->realText(rand(20, 400)),
                    'rate' => rand(1, 5),
                    'like' => 0,
                    'created_at' => $randomDateTime,
                    'updated_at' => $randomDateTime,
                ];
            }

            for ( $j = 0; $j < $num_review_per_recording - $num_review_with_title; $j++ ) {
                $randomDateTime = $faker->dateTimeBetween($startDate='-3 year', $endDate='now');
                $reviews[] = [
                    'user_id' => $chosen_user_ids[$num_review_with_title+$j],
                    'recording_id' => $i_recording_id,
                    'title' => null,
                    'content' => null,
                    'rate' => rand(1, 5),
                    'like' => 0,
                    'created_at' => $randomDateTime,
                    'updated_at' => $randomDateTime,
                ];
            }
        }

        $json_reviews = json_encode($reviews, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        file_put_contents('database/seeders/reviews.json', $json_reviews);
    }
}
