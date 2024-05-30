<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Consultation;
use App\Models\School;
use App\Models\User;

class ConsultationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all school IDs and parent IDs
        $schoolIds = School::pluck('id')->toArray();
        $parentIds = User::where('role', 'parent')->pluck('id')->toArray();

         // Generate 50 consultations
         for ($i = 0; $i < 20; $i++) {
            Consultation::create([
                'school_id' => $faker->randomElement($schoolIds),
                'parent_id' => $faker->randomElement($parentIds),
                'contact_info' => $faker->phoneNumber,
                'status' => $faker->randomElement(['pending', 'confirmed', 'completed']),
            ]);
        }
    }
}
