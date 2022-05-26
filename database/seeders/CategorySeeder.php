<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    public function run()
    {
        //
        $faker = Faker::create();

          DB::table('categories')->insert([
              'name' => 'سيارة',
              'image' => $faker->image('public/images/categories',640,480, null, false),
              'is_active' => '1',
          ]);
          DB::table('categories')->insert([
            'name' => 'تاكسي',
            'image' => $faker->image('public/images/categories',640,480, null, false),
            'is_active' => '1',
          ]);
          DB::table('categories')->insert([
            'name' => 'شاحنة',
            'image' => $faker->image('public/images/categories',640,480, null, false),
            'is_active' => '1',
          ]);
          DB::table('categories')->insert([
            'name' => 'حافلة',
            'image' => $faker->image('public/images/categories',640,480, null, false),
            'is_active' => '1',
          ]);

    }
}
