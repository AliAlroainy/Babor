<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ServiceSeeder extends Seeder
{
   
    public function run()
    {
        //
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        DB::table('services')->insert([
            'title' => 'عروض حصرية',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d','2020-3-12'),

        ]);
        DB::table('services')->insert([
            'title' => 'امان وتشفير ',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d', '2020-3-12'),

        ]);
        DB::table('services')->insert([
            'title' => ' اليه للبيع والشراء ',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d', '2020-3-12'),

        ]);
        DB::table('services')->insert([
            'title' => '   مزادات متنوعه ',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d', '2020-3-12'),

        ]);
        DB::table('services')->insert([
            'title' => 'امكانية عرض سياراتك ',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d', '2020-3-12'),

        ]);
        DB::table('services')->insert([
            'title' => '  تجربة مستخدم ممتعه ',
            'description' => $faker->sentence(8),
            'pic' => $faker->image('public/images/services',640,480, null, false),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', '2020-3-12'),
            'updated_at' => $faker->date('Y-m-d', '2020-3-12'),

       ]);
    }
}
