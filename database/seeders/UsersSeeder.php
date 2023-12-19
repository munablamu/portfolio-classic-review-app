<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $num_users = 100;

        $users = User::factory($num_users)->create();

        foreach ( $users as $i => $i_user ) {
            $i_user->update([
                'icon_filename' => 'user_' . str($i+1) . '.jpg',
            ]);
        }

        // 採用担当者向けのサンプルアカウント
        DB::table('users')->insert([
            'name' => 'Hoge',
            'email' => 'hoge@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'self_introduction' => fake()->realText(400),
            'icon_filename' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
