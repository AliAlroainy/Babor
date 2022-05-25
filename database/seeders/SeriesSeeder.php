<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $unixTimestamp = '1461067200';

          DB::table('series')->insert([
              'name' => 'صني',
              'brand_id' => '5',
              'is_active' => '1',
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
          DB::table('series')->insert([
            'name' => 'تاهو',
            'brand_id' => $faker->numberBetween(2,3),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => 'تورس',
            'brand_id' => $faker->numberBetween(3,4),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
        ]);
        DB::table('series')->insert([
            'name' => 'باترول',//النوع
            'brand_id' => '5',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => 'فيتو',//النوع
            'brand_id' => '6',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => '        باص سياحي
            ',//النوع
            'brand_id' => '4',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => '          اشوك لاند
            ',//النوع
            'brand_id' => '4',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => '           اتيكو
            ',//النوع
            'brand_id' => '4',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => '           صهريج - تنك
            ',//النوع
            'brand_id' => '4',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => '  ديانة
            ',//النوع
            'brand_id' => '4',
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);

}
}
