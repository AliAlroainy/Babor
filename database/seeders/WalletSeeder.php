<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WalletSeeder extends Seeder
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
        foreach(range(1, 10) as $i) {
            DB::table('wallets')->insert([
                'holder_type' => 'App\Models\User',
                'holder_id' => $i,
                'name' => 'Default Wallet',
                'slug' => 'default',
                'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'description'=> $faker->sentence(20),
                'meta' => '[]',
                'balance' => 10000000,
                'decimal_places' => 2,
                'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
                'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
            ]);
        }
    }
}
