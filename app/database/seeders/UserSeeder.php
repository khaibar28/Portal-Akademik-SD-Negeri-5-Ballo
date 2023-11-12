<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'user_number' => 'admin',
            'name' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        User::create([
            'user_number' => 'teacher',
            'name' => 'teacher',
            'role' => 'teacher',
            'password' => Hash::make('teacher'),
        ]);

        User::create([
            'user_number' => 'student',
            'name' => 'student',
            'role' => 'student',
            'password' => Hash::make('student'),
        ]);
    }
}
