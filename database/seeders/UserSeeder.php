<?php

namespace Database\Seeders;

#use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Yusri Ishak', 'email' => 'yusri@example.com', 'userid' => 'yusri', 'password' => bcrypt('password'), 'role' => 'tutor'],
            ['name' => 'Hakim Danial', 'email' => 'hakim@example.com', 'userid' => 'hakim', 'password' => bcrypt('password'), 'role' => 'tutor'],
            ['name' => 'Fadhil Ali', 'email' => 'fadhiln@example.com', 'userid' => 'fadhil', 'password' => bcrypt('password'), 'role' => 'tutor'],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}