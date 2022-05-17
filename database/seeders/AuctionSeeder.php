<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;
class AuctionSeeder extends Seeder
{
    public function run()
    {

        $year = rand(2022, 2023);
        $month = rand(5, 12);
        $day = rand(9, 28);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
          DB::table('auctions')->insert([
              'closeDate' => $date->addWeeks(rand(1, 4))->format('Y-m-d H:i:s'),
              'minInc' => $faker->numberBetween(30000,60170),
              'startDate' => $date->format('Y-m-d H:i:s'),
              'openingBid' =>   $faker->numberBetween(40000,68017),
              'reservePrice' => $faker->numberBetween(40000,68017),
              'auctioneer_id' => $faker->numberBetween(2,10),
              'car_id' => $faker->numberBetween(1,5),
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),

          ]);
  }
    }
}
