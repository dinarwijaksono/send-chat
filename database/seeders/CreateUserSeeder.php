<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'user 1',
            'email' => 'userTest1@gmail.com',
            'password' => Hash::make('rahasia')
        ]);

        User::create([
            'name' => 'user 2',
            'email' => 'userTest2@gmail.com',
            'password' => Hash::make('rahasia')
        ]);
    }
}
