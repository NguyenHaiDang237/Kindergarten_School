<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Rating;
use App\Models\School;
use App\Models\User;
class RatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all school IDs and parent IDs
        $schoolIds = School::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

         // Generate 50 consultations
         for ($i = 0; $i < 20; $i++) {
            Rating::create([
                'school_id' => $faker->randomElement($schoolIds),
                'user_id' => $faker->randomElement($userIds),
                'rating' => $faker->numberBetween(1, 5),
                'comment' => $faker->paragraph,
              
            ]);
        }
    }
}
