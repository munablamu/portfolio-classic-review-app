<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artists = json_decode(file_get_contents('database/seeders/artists.json'));

        foreach ( $artists as $i_artist ) {
            DB::table('artists')->insert([
                'name' => $i_artist->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
