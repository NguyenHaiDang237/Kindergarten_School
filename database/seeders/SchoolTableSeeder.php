<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker= Faker::create();
        //Chạy vòng lặp số bản ghi và DataType từ Faker
        for($i=0;$i<20;$i++){
            School::create([
                    'name' => $faker->name,
                    'location' => $faker->address,                
                    'type' => $faker->randomElement(['private', 'public', 'international'])
                    
            ]);
        }
    }
}
