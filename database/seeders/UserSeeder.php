<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin
        User::create([
            'name' => 'Iam Admin',
            'password' => Hash::make('123'),
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
    }
}
