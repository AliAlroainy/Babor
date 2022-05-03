<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $unixTimestamp = '1461067200';
        $faker = Faker::create();

          DB::table('brands')->insert([
              'name' =>'فورد',
              'logo' => $faker->image('public/images/brands',640,480, null, false),
              'is_active' => $faker->shuffle([1, -1]),
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
          DB::table('brands')->insert([
            'name' =>'تويوتا',
            'logo' => $faker->image('public/images/brands',640,480, null, false),
            'is_active' => $faker->shuffle([1, -1]),
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('brands')->insert([
            'name' =>'GMC',
            'logo' => $faker->image('public/images/brands',640,480, null, false),
            'is_active' => $faker->shuffle([1, -1]),
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('brands')->insert([
            'name' =>'هونداي',
            'logo' => $faker->image('public/images/brands',640,480, null, false),
            'is_active' => $faker->shuffle([1, -1]),
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('brands')->insert([
            'name' =>'نيسان',
            'logo' => $faker->image('public/images/brands',640,480, null, false),
            'is_active' => $faker->shuffle([1, -1]),
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);

    }
}
