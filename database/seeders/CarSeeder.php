<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class CarSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create();
          DB::table('cars')->insert([
              'color' => 'نيلي',
              'model' => $faker->numberBetween(1900,2017),
              'numberOfKillos' => $faker->numberBetween(30,100),
              'thumbnail' =>  'car1.jpg',
              'car_images' =>  json_encode(['car1_1.jpg', 
                                            'car1_2.jpg',
                                            'car1_3.jpg',  
                                                ]),
              'description' => $faker->sentence(8),
              'carPosition'=> $faker->sentence(8),
              'status' => '0',
              'brand_id' => $faker->numberBetween(1,5),
              'series_id' => $faker->numberBetween(1,4),
              'category_id' => '1',
          ]);
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car2.jpg',
            'car_images' =>  json_encode(['car2_1.jpg', 
                                            'car2_2.jpeg',
                                            'car2_3.jpg',  
                                        ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أزرق',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car3.jpg',
            'car_images' =>  json_encode(['car3_1.jpg', 
                                          'car3_2.jpg',
                                          'car3_3.jpg',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أحمر',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car4.jpg',
            'car_images' =>  json_encode(['car4_1.jpg', 
                                          'car4_2.jpg',
                                          'car4_3.jpg',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أزرق',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car5.jpg',
            'car_images' =>  json_encode(['car5_1.jpg', 
                                          'car5_2.jpg',
                                          'car5_3.jpg',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أزرق',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car5.jpg',
            'car_images' =>  json_encode(['car5_1.jpg', 
                                          'car5_2.jpg',
                                          'car5_3.jpg',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'daihatsu_gran_1.webp',
            'car_images' =>  json_encode(['daihatsu_gran_2.webp', 
                                          'daihatsu_gran_3.webp',
                                          'daihatsu_gran_4.webp',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'hyundai_caunty_3.webp',
            'car_images' =>  json_encode(['hyundai_caunty_1.webp', 
                                          'hyundai_caunty_2.webp',
                                          'hyundai_caunty_4.webp',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'toyota_camry_1.webp',
            'car_images' =>  json_encode(['toyota_camry_2.webp', 
                                          'toyota_camry_3.webp',
                                          'toyota_camry_4.webp',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);
          
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'toyota_hilux_4.webp',
            'car_images' =>  json_encode(['toyota_hilux_1.webp', 
                                          'toyota_hilux_2.webp',
                                          'toyota_hilux_3.webp',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'كاكي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'toyota_land_cruiser_4.webp',
            'car_images' =>  json_encode(['toyota_land_cruiser_3.webp', 
                                          'toyota_land_cruiser_2.webp',
                                          'toyota_land_cruiser_1.webp',  
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);
    }

}
