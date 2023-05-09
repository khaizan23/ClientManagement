<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(['id' => 1], [
            'name' => 'Khaizan',
            'email' => 'khaizan@yahoo.com',
            'password' => '$2y$10$vsrewpmZs3ThxeIb6m4/1OwOFGMbR0wo3DZ22amXKeBsjCNzmJ7Ve' //Password
        ]);

    }
}
