<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $num_users = 100;

        $users = User::factory($num_users)->create();

        foreach ( $users as $i => $user ) {
            $user->update([
                'icon_filename' => 'user_' . str($i+1) . '.jpg',
            ]);
        }
    }
}
