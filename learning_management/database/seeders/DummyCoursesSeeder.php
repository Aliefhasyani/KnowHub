<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Courses;
use App\Models\User;  // Import the User model to reference existing users

class DummyCoursesSeeder extends Seeder
{
    public function run()
    {
        // Assuming there is at least one teacher and one admin in the users table
        $teacher = User::where('role', 'teacher')->first(); // Get the first teacher
        $admin = User::where('role', 'admin')->first(); // Get the first admin

        // Insert dummy courses with teacher_id and admin_id
        Courses::create([
            'name' => 'Bahasa Inggris',
            'description' => 'Kelas Bahasa Inggris',
            'teacher_id' => $teacher->id, // Assign the teacher ID
            'admin_id' => $admin->id,     // Assign the admin ID
        ]);

        // You can add more courses here as needed
    }
}
