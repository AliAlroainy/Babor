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
        foreach (range(1,5) as $index) {
          DB::table('series')->insert([
              'name' => $faker->word(),
              'brand_id' => $faker->$faker->numberBetween(1,5),
              'is_active' => $faker->numberBetween(0,1),

          ]);
    }
}
}
