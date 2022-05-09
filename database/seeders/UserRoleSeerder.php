<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserRoleSeerder extends Seeder
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
        foreach (range(1,20) as $index) {
          DB::table('role_user')->insert([

              'role_id' => '1',
              'user_id' => $faker->numberBetween(1,20),
              'user_type' => 'App\Models\User',


          ]);
  }
    }
}
