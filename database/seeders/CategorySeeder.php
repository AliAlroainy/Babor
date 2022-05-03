<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
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
          DB::table('categories')->insert([
              'name' => $faker->word(),
              'image' => $faker->image('public/images/categories',640,480, null, false),
              'is_active' => '1',
          ]);
  }
    }
}
