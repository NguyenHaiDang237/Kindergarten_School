<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Khoi tao doi tuong Faker
        $faker= Faker::create();
        //Chạy vòng lặp số bản ghi và DataType từ Faker
        for($i=0;$i<50;$i++){
            User::create([
                    'name' => $faker->name,
                    'email' => $faker->safeEmail,
                    'age' => $faker->numberBetween(18, 65),
                    'password' => bcrypt('password'), // Bạn nên mã hóa mật khẩu
                    'role' => $faker->randomElement(['admin', 'school_owner', 'parent'])
                    
            ]);
        }
    }
}
