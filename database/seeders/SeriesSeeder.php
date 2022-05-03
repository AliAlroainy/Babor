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
              'name' => 'نافارا',
              'brand_id' => $faker->numberBetween(1,2),
              'is_active' => '1',
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
          DB::table('series')->insert([
            'name' => 'تورس',
            'brand_id' => $faker->numberBetween(2,3),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => 'النترا',
            'brand_id' => $faker->numberBetween(3,4),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);
        DB::table('series')->insert([
            'name' => 'باترول',//النوع
            'brand_id' => $faker->numberBetween(3,5),
            'is_active' => '1',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

        ]);

}
}
