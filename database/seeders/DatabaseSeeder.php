<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'username' => 'admin123',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);
    }
}
