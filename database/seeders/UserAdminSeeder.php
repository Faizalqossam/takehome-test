<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'firstName' => 'admin',
            'lastName' => '123',
            'email' => 'admin@gmail.com',
            'password' => 'Admin',
            'birthdate' => '2024-10-07',
            'gender' => 'Male',
            'password' => Hash::make('admin123'),
        ]);
    }
}
