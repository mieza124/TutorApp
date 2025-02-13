<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posting;
use App\Models\TutoringSession;
use App\Models\Tutor;
use App\Models\User;
use App\Models\Subject;

class PostingSeeder extends Seeder
{
    public function run()
    {
        $postings = [
            ['tutor_id' => Tutor::where('user_id', User::where('email', 'yusri@example.com')->first()->id)->first()->id, 'tutoringsession_id' => TutoringSession::where('subject_id', Subject::where('name', 'Mathematics')->first()->id)->first()->id, 'title' => 'Math Tutoring for Primary School', 'description' => 'Join our online math tutoring sessions.', 'image' => 'session1.jpg'],
            ['tutor_id' => Tutor::where('user_id', User::where('email', 'hakim@example.com')->first()->id)->first()->id, 'tutoringsession_id' => TutoringSession::where('subject_id', Subject::where('name', 'Science')->first()->id)->first()->id, 'title' => 'Science Tutoring for Lower Secondary', 'description' => 'Hands-on science sessions.', 'image' => 'session2.jpg'],
            ['tutor_id' => Tutor::where('user_id', User::where('email', 'fadhil@example.com')->first()->id)->first()->id, 'tutoringsession_id' => TutoringSession::where('subject_id', Subject::where('name', 'Science')->first()->id)->first()->id, 'title' => 'Science Tutoring for Lower Secondary', 'description' => 'Hands-on science sessions.', 'image' => 'session2.jpg'],
        ];

        foreach ($postings as $postingData) {
            Posting::create($postingData);
        }
    }
}
