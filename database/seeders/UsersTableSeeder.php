<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'elaman@mail.ru')->first();


        if (!$user) {
            User::create([
                'name' => 'Yelaman',
                'email' => 'elaman@mail.ru',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}