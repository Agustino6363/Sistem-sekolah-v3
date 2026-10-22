<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTeacherEmail = 'selvin.001@ski.sch.id';
        $userStudentEmail = 'daril@ski.sch.id';

        // User Teacher
        User::updateOrCreate(
            ['email' => $userTeacherEmail],
            [
                'name' => 'Selvin Sitorus',
                'password' => bcrypt('password'),
                'role' => 'teacher'
            ]
        );

         // User Student
        User::updateOrCreate(
            ['email' => $userStudentEmail],
            [
                'name' => 'Selvin Sitorus',
                'password' => bcrypt('password'),
                'role' => 'student'
            ]
        );
    }
}
