<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        DB::table('profiles')->insert([
            'username' => 'Jehad',
            'city' => 'Taiz',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/jihad.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Software Engineering',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '2',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Abrar',
            'city' => 'Taiz',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/abrar.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'IT Engineering',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '3',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Reem',
            'city' => 'Taiz',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/reem.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Web Developer',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '4',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Ali',
            'city' => 'Taiz',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/ali.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'UI/UX',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '5',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Hamad',
            'city' => 'Taiz',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/hamad.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Web Degsiner',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '6',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Erada',
            'city' => 'Sanaa',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/erada.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Supervisor',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '7',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Nashwan',
            'city' => 'Sanaa',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/nashwan.jpg',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Projet Manager',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '8',
        ]);

        DB::table('profiles')->insert([
            'username' => 'Mokhtar',
            'city' => 'Sanaa',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/mokhtar.png',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Product Manager',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '9',
        ]);


        DB::table('profiles')->insert([
            'username' => 'Haitham',
            'city' => 'Sanaa',
            'address' => $faker->sentence(4),
            'avatar' => 'profiles/haitham.png',
            'phone' => $faker->numerify('###-###-###'),
            'bio'=> $faker->sentence(10),
            'job' => 'Super Sponsor',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            'user_id'=> '10',
        ]);
    }
}
