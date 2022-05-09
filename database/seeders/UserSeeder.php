<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = new User;
        // $admin->name        = "admin";
        // $admin->email       = "admin@gmail.com";
        // $admin->password    = Hash::make('123');
        // $admin->is_active   = 1;
        // $admin->created_at  = now();
        // $admin->updated_at  = now();
        // $admin->save();
        // $admin->attachRole('super_admin');



        $unixTimestamp = '1461067200';
        $faker = Faker::create();
        foreach (range(1,20) as $index) {
        DB::table('users')->insert([
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('123'),
        'is_active' => '1',
        'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
       'email_verified_at'=> $faker->date('Y-m-d', $unixTimestamp),
        'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
        'remember_token' => Str::random(10),

    ]);
}}
}
