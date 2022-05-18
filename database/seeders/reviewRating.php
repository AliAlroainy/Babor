<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class reviewRattingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('review_ratings')->insert([
            'user_id' => '1',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '2',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '6',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '7',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '8',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '9',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
         DB::table('review_ratings')->insert([
            'user_id' => '10',
            'name'=> 'hadeel',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
    }
}
