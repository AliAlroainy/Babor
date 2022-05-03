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
        //
        // $faker = Faker::create();
        // foreach (range(1,10) as $index) {
        //   DB::table('cars')->insert([
        //       'color' => 'اسود',
        //       'model' => $faker->numberBetween(1900,2017),
        //       'numberOfKillos' => $faker->numberBetween(30,100),
        //       'thumbnail' => 'img/c1.jpg',
        //       'car_images' => 'img/c4.jpg',
        //       'description' => $faker->sentence(8),
        //       'carPosition'=> $faker->sentence(8),
        //       'brand_id' => $faker->numberBetween(1,3),
        //       'category_id' => $faker->numberBetween(1,3),
        //       'series_id' => $faker->numberBetween(1,3),
        //   ]);
  }

    }

