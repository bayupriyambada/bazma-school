<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\LessonModel::insert([
            'uuid' => Str::uuid(),
            'code_lesson' => 'MK01',
            'name_lesson' => 'Matematika',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'uuid' => Str::uuid(),
            'code_lesson' => 'KJ01',
            'name_lesson' => 'Komunikasi Jaringan',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
