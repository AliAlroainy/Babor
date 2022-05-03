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
        $faker = Faker::create();
        foreach (range(1,5) as $index) {
          DB::table('brands')->insert([
              'name' => $faker->word(),
              'logo' => $faker->image('public/images/categories',640,480, null, false),
              'is_active' => $faker->numberBetween(1,3),
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
    }
    }
}
