<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisionMisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\VisionMisionModel::create([
            'uuid' => Str::uuid(),
            'content' => '
            <p>Vision and Mision in here</p>',
        ]);
    }
}
