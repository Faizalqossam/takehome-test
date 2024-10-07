<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; // Import Faker


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $students = [];
        for ($i = 0; $i < 10; $i++) {
            $students[] = [
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'phoneNumber' => $faker->phoneNumber,
                'studentId' => $faker->unique()->numberBetween(10000, 99999),
                'address' => $faker->address,
                'gender' => $faker->randomElement(['Male', 'Female']),
            ];
        }

        // Insert data into the students table
        DB::table('students')->insert($students);

    }
}
