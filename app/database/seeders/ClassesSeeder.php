<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'grade' => 'Kelas 1 ',
        ]);

        Classes::create([
            'grade' => 'Kelas 2',
        ]);

        Classes::create([
            'grade' => 'Kelas 3',
        ]);

        Classes::create([
            'grade' => 'Kelas 4',
        ]);

        Classes::create([
            'grade' => 'Kelas 5',
        ]);

        Classes::create([
            'grade' => 'Kelas 6',
        ]);
    }
}
