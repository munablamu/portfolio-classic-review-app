<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComposersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // https://classicalmusiconly.com/list/100-greatest-classical-music-works-f164de5b から引用
        $composers = json_decode(file_get_contents('database/seeders/composers.json'));

        foreach ( $composers as $i_composer ) {
            DB::table('composers')->insert([
                'name' => $i_composer->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
