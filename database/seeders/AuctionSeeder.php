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

        $year = rand(2022, 2022);
        $month = rand(5, 12);
        $day = rand(27, 31);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);
        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        foreach (range(1,22) as $index) {
          DB::table('auctions')->insert([
              'closeDate' => $date->addWeeks(rand(1, 2))->format('Y-m-d H:i:s'),
              'minInc' => $faker->numberBetween(100,350),
              'startDate' => $date->format('Y-m-d H:i:s'),
              'openingBid' =>   $faker->numberBetween(200,3800),
              'reservePrice' => $faker->numberBetween(4000,6800),
              'auctioneer_id' => $faker->numberBetween(2,10),
              'car_id' => $index,
              'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
              'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
          ]);
  }
    }
}
