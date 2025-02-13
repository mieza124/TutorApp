<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TutoringSession;
use App\Models\Subject;
use App\Models\Tutor;
use App\Models\User;

class TutoringSessionSeeder extends Seeder
{
    public function run()
    {
        $sessions = [
            ['subject_id' => Subject::where('name', 'Mathematics')->first()->id, 'tutor_id' => Tutor::where('user_id', User::where('email', 'yusri@example.com')->first()->id)->first()->id, 'schedule' => 'Mon-Wed-Fri 10:00-11:00', 'registered' => 5, 'availability' => 5, 'mode' => 'Online', 'fees' => 100.00],
            ['subject_id' => Subject::where('name', 'Science')->first()->id, 'tutor_id' => Tutor::where('user_id', User::where('email', 'hakim@example.com')->first()->id)->first()->id, 'schedule' => 'Tue-Thu 14:00-15:00', 'registered' => 3, 'availability' => 7, 'mode' => 'Physical', 'fees' => 150.00],
            ['subject_id' => Subject::where('name', 'Science')->first()->id, 'tutor_id' => Tutor::where('user_id', User::where('email', 'fadhil@example.com')->first()->id)->first()->id, 'schedule' => 'Tue-Thu 14:00-15:00', 'registered' => 3, 'availability' => 7, 'mode' => 'Physical', 'fees' => 150.00],
        ];

        foreach ($sessions as $sessionData) {
            TutoringSession::create($sessionData);
        }
    }
}
