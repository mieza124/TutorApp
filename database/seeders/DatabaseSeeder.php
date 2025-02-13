<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            TutorSeeder::class,
            SubjectSeeder::class,
            TutoringSessionSeeder::class,
            PostingSeeder::class,
        ]);
    }
}
