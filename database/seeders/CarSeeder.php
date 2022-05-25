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
              'color' => 'أبيض',
              'model' => '2019',
              'numberOfKillos' => '133185',
              'thumbnail' =>  'car1.PNG',
              'car_images' =>  json_encode(['car12.PNG',
                                            'car13.PNG',
                                            'car14.PNG',
                                            'car14.PNG',
                                            'car15.PNG',
                                            'car16.PNG',
                                                ]),
              'description' => 'ستاندرد',
              'carPosition'=> $faker->sentence(8),
              'status' => '0',
              'jear'   => '0',
              'brand_id' =>'5',
              'series_id' => '1',
              'category_id' => '1',
          ]);
          DB::table('cars')->insert([
            'color' => 'رمادي',
            'model' =>'2017',
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'car2.PNG',
            'car_images' =>  json_encode(['car22.PNG',
                                            'car23.PNG',
                                            'car24.PNG',
                                            'car25.PNG',
                                        ]),
            'description' =>'نص فل دبل',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '1',
            'brand_id' => '5',
            'series_id' =>'4',
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '2017',
            'numberOfKillos' => '152276',
            'thumbnail' =>    'car3.PNG',
            'car_images' =>  json_encode(['car31.PNG',
                                          'car32.PNG',
                                          'car33.PNG',
                                          'car34.PNG',
                                          'car35.PNG',
                                            ]),
            'description' =>'نص فل',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'brand_id' => '7',
            'series_id' => '2',
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أسود',
            'model' => '2019',
            'numberOfKillos' => '98794',
            'thumbnail' =>    'car4.PNG',
            'car_images' =>  json_encode(['car41.PNG',
                                          'car42.PNG',
                                          'car43.PNG',
                                          'car44.PNG',
                                            ]),
            'description' => 'ستاندر',
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => '1',
            'series_id' => '3',
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أخضر',
            'model' => '2006',
            'numberOfKillos' => '300,000',
            'thumbnail' =>    'bus12.png',
            'car_images' =>  json_encode(['bus1.png',
                                          'bus13.png',
                                          'bus14.png',
                                          'bus15.png',
                                            ]),
            'description' => 'ميني باص',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '0',
            'brand_id' => '6',
            'series_id' => '5',
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'أحمر',
            'model' => '2010',
            'numberOfKillos' => '160,000',
            'thumbnail' =>    'bus2.png',
            'car_images' =>  json_encode(['bus21.png',
                                          'bus2.png',

                                            ]),
            'description' => ' باص سياحي هيونداي مستعمل أحمر 2010',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '0',
            'brand_id' => '4',
            'series_id' => '6',
            'category_id' => '4',
          ]);

          DB::table('cars')->insert([
            'color' => 'أزرق',
            'model' => '2013',
            'numberOfKillos' => '169,500',
            'thumbnail' =>    'bus3.png',
            'car_images' =>  json_encode(['bus31.png',
                                          'bus32.png',
                                          'bus33.png',
                                          'bus34.png',

                                            ]),
            'description' => 'باص سياحي كينج لونج',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '0',
            'brand_id' => '8',
            'series_id' => '6',
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '2017',
            'numberOfKillos' => '80,000',
            'thumbnail' =>    'bus4.jpg',
            'car_images' =>  json_encode(['bus41.jpg',
                                          'bus42.jpg',
                                          'bus43.jpg',


                                            ]),
            'description' => 'اشوك لاند موديل ٢٠١٥ موديل ٢٠١٧ موديل ٢٠١٨ يوجد عدد ٥٦ راكب ويوجد عدد ٦٠ راكب مع الساق',
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '0',
            'brand_id' => '8',
            'series_id' => '7',
            'category_id' => '4',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '1999',
            'numberOfKillos' => '5000',
            'thumbnail' =>    'fan1.jpg',
            'car_images' =>  json_encode(['fan11.jpg',
                                          'fan12.jpg',
                                          'fan13.jpg',
                                          'fan14.jpg',
                                            ]),
            'description' => 'البي اتكو موديل 99 815 طبعه لوجستيه الطول سته وربع ارتفاع285 زجاج كهرباء شاشه مع كاميرا السياره نضيفا جدااا 0795215221',
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => '6',
            'series_id' => '8',
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '1999',
            'numberOfKillos' => '5000',
            'thumbnail' =>    'fan2.jpg',
            'car_images' =>  json_encode(['fan21.jpg',
                                          'fan22.jpg',
                                          'fan23.jpg',
                                          'fan24.jpg',
                                            ]),
            'description' => 'البي اتكو موديل 99 815 طبعه لوجستيه الطول سته وربع ارتفاع285 زجاج كهرباء شاشه مع كاميرا السياره نضيفا جدااا 0795215221',
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => '6',
            'series_id' => '8',
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '1999',
            'numberOfKillos' => '5000',
            'thumbnail' =>    'fan4.jpg',
            'car_images' =>  json_encode(['fan41.jpg',
                                          'fan42.jpg',

                                            ]),
            'description' => 'سطحة مع جوانب',
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => '8',
            'series_id' => '10',
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => '1984',
            'numberOfKillos' => '23,490',
            'thumbnail' =>    'fan3.jpg',
            'car_images' =>  json_encode(['fan31.jpg',

                                            ]),
            'description' => 'وايت صرف صحي',
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => '9',
            'series_id' => '9',
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
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'كحلي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'hyundai_accent_1.webp',
            'car_images' =>  json_encode(['hyundai_accent_2.webp',
                                          'hyundai_accent_3.webp',
                                          'hyundai_accent_4.webp',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'hyundai_creta_1.webp',
            'car_images' =>  json_encode(['hyundai_creta_2.webp',
                                          'hyundai_creta_3.webp',
                                          'hyundai_creta_4.webp',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '1',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'daihatsu_gran_3.webp',
            'car_images' =>  json_encode(['daihatsu_gran_1.webp',
                                          'daihatsu_gran_2.webp',
                                          'daihatsu_gran_4.webp',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);

          DB::table('cars')->insert([
            'color' => 'أبيض',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'volvo_fh_1.jpg',
            'car_images' =>  json_encode(['volvo_fh_2.jpg',
                                          'volvo_fh_3.jpg',
                                          'volvo_fh_4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '1',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' =>    'volvo_fh16_1.jpg',
            'car_images' =>  json_encode(['volvo_fh16_2.jpg',
                                          'volvo_fh16_3.jpg',
                                          'volvo_fh16_4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'volvo_fh16_1.jpg',
            'car_images' =>  json_encode(['volvo_fh16_2.jpg',
                                          'volvo_fh16_3.jpg',
                                          'volvo_fh16_4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'taxi4.jpg',
            'car_images' =>  json_encode(['taxi1.jpg',
                                          'taxi2.jpg',
                                          'taxi3.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '2',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'taxi8.jpg',
            'car_images' =>  json_encode(['taxi7.jpg',
            'taxi5.jpg',
            'taxi6.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '2',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'taxi9.jpg',
            'car_images' =>  json_encode(['taxi10.jpg',
                                          'taxi11.jpg',
                                          'taxi12.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '2',
          ]);

          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'babor1.jpg',
            'car_images' =>  json_encode(['babor2.jpg',
                                          'babor3.jpg',
                                          'babor4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'babor5.jpg',
            'car_images' =>  json_encode(['babor6.jpg',
                                          'babor7.jpg',
                                          'babor8.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'babor9.jpg',
            'car_images' =>  json_encode(['babor2.jpg',
                                          'babor5.jpg',
                                          'babor4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'babor5.jpg',
            'car_images' =>  json_encode(['babor2.jpg',
                                          'babor7.jpg',
                                          'babor9.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '0',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '3',
          ]);

          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'bus1.jpg',
            'car_images' =>  json_encode(['bus2.jpg',
                                          'bus3.jpg',
                                          'bus4.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'bus5.jpg',
            'car_images' =>  json_encode(['bus6.jpg',
                                          'bus7.jpg',
                                          'bus8.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'bus9.jpg',
            'car_images' =>  json_encode(['bus10.jpg',
                                          'bus11.jpg',
                                          'bus12.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);
          DB::table('cars')->insert([
            'color' => 'رصاصي',
            'model' => $faker->numberBetween(1900,2017),
            'numberOfKillos' => $faker->numberBetween(30,100),
            'thumbnail' => 'bus8.jpg',
            'car_images' =>  json_encode(['bus2.jpg',
                                          'bus7.jpg',
                                          'bus10.jpg',
                                            ]),
            'description' => $faker->sentence(8),
            'carPosition'=> $faker->sentence(8),
            'status' => '0',
            'jear'   => '1',
            'brand_id' => $faker->numberBetween(1,5),
            'series_id' => $faker->numberBetween(1,4),
            'category_id' => '4',
          ]);
    }

}
