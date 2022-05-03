<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1,5) as $index) {
          DB::table('cars')->insert([
              'color' => 'اسود',
              'model' => $faker->numberBetween(1900,2017),
              'numberOfKillos' => $faker->numberBetween(30,100),
              'thumbnail' =>    $faker->image('public/images/cars',640,480, null, false),
              'car_images' =>  $faker->image('public/images/cars',640,480, null, false),
              'description' => 'نص فل',
              'carPosition'=> $faker->sentence(8),
              'brand_id' => $faker->numberBetween(1,5),
              'series_id' => $faker->numberBetween(1,5),
              'category_id' => $faker->numberBetween(1,5),

          ]);
  }

    }

}
