<?php

namespace Database\Seeders;

use App\Models\Recording;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        foreach ( $recordings as $i_recording ) {
            $all_user_ids = range(1, 100);
            shuffle($all_user_ids);
            $chosen_user_ids = array_slice($all_user_ids, 0, 15);

            for ( $i = 0; $i < 5; $i++ ) {
                DB::table('reviews')->insert([
                    'user_id' => $chosen_user_ids[$i],
                    'recording_id' => $i_recording->id,
                    'review' => $faker->realText(100),
                    'rate' => rand(1, 5),
                    'like' => rand(0, 500),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            for ( $i = 0; $i < 10; $i++ ) {
                DB::table('reviews')->insert([
                    'user_id' => $chosen_user_ids[$i+5],
                    'recording_id' => $i_recording->id,
                    'review' => null,
                    'rate' => rand(1, 5),
                    'like' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
