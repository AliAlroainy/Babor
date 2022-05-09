<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class AuctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
          DB::table('auctions')->insert([
              'closeDate' => $faker->date('Y-m-d', $unixTimestamp),
              'minInc' => $faker->numberBetween(30000,60170),
              'startDate' => $faker->date('Y-m-d', $unixTimestamp),
              'openingBid' =>   $faker->numberBetween(40000,68017),
              'reservePrice' => $faker->numberBetween(40000,68017),
              'auctioneer_id' => $faker->numberBetween(1,10),
              'car_id' => $faker->numberBetween(1,5),
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
  }
    }
}
