<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExtracurricularActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('extracurricular_activities')->insert([
                    [
                        'name' => 'Basketball Club',
                        'description' => 'A club for basketball enthusiasts.',
                        'start_date' => '2024-01-10',
                        'end_date' => '2024-05-10',
                        'location' => 'Gymnasium',
                        'capacity' => 30,
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Robotics Team',
                        'description' => 'A team focused on building robots and competing.',
                        'start_date' => '2024-02-01',
                        'end_date' => '2024-06-01',
                        'location' => 'Tech Lab',
                        'capacity' => 15,
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'name' => 'Drama Club',
                        'description' => 'For those who love acting and theater.',
                        'start_date' => '2024-03-15',
                        'end_date' => '2024-07-15',
                        'location' => 'Auditorium',
                        'capacity' => 20,
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
    }
}
