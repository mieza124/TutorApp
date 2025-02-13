<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            ['name' => 'English', 'level' => 'Primary'],
            ['name' => 'Physics', 'level' => 'Upper Secondary'],
            ['name' => 'Additional Mathematics', 'level' => 'Upper Secondary'],
        ];

        foreach ($subjects as $subjectData) {
            Subject::create($subjectData);
        }
    }
}