<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'level' => 'admin',
            'nim' => '1234567890',
            'birth_date' => '2000-01-01',
            'birth_place' => 'Jakarta',
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'level' => 'user',
            'nim' => '1234567890',
            'birth_date' => '2000-01-01',
            'birth_place' => 'Jakarta',
        ]);
        User::create([
            'name' => 'Pembina',
            'email' => 'pembina@gmail.com',
            'password' => Hash::make('pembina'),
            'level' => 'pembina',
            'nim' => '1234567890',
            'birth_date' => '2000-01-01',
            'birth_place' => 'Jakarta',
        ]);
    }
}
