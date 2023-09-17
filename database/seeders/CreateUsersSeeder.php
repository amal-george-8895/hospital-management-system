<?php namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Admin', 'email' => 'user@final-yr-project.com', 'type' => 1, 'password' => bcrypt('admin240'),],
            ['name' => 'Patient', 'email' => 'patient@final-yr-project.com', 'type' => 2, 'password' => bcrypt('patient123'),],
            ['name' => 'Doctor', 'email' => 'doctor@final-yr-project.com', 'type' => 3, 'password' => bcrypt('doctor456'),],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
