<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AboutSchoolModel::insert([
            'uuid' => Str::uuid(),
            'site_title' => 'School Low',
            'tag_title' => 'The lorem ipsum is based on De finibus bonorum et malorum',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
