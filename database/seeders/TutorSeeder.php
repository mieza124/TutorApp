<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;
use App\Models\User;

class TutorSeeder extends Seeder
{
    public function run()
    {
        $tutors = [
            ['user_id' => User::where('email', 'yusri@example.com')->first()->id, 'bio' => 'Experienced tutor in various subjects.', 'image' => 'farid.jpg'],
            ['user_id' => User::where('email', 'hakim@example.com')->first()->id, 'bio' => 'Experienced tutor in various subjects.', 'image' => 'helmi.jpg'],
            ['user_id' => User::where('email', 'fadhil@example.com')->first()->id, 'bio' => 'Experienced tutor in various subjects.', 'image' => 'zaimar.jpg'],
        ];

        foreach ($tutors as $tutorData) {
            Tutor::create($tutorData);
        }
    }
}