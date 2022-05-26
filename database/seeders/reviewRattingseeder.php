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
            'user_id' => '2',
            'name'=> 'جهاد المليكي',
            'comments' => 'رائع',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'ابرار الخرساني',
            'comments' => 'ممتاز ،انصح بشراء من هذا البائع',
            'star_rating' => '4',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'علي الرعيني',
            'comments' => 'كنت اتمني المزايده بهذه السياره ،لكن لتوي انهيت احدى المزادات',
            'star_rating' => '3',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'حمد البكيل',
            'comments' => 'جيد، لاباس بها',
            'star_rating' => '1',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'هيثم المقطري ',
            'comments' => 'موقع بابور موقع امن دائما يوفر افضل العروض',
            'star_rating' => '5',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '6',
            'name'=> 'اراده الفقي',
            'comments' => 'سياره واو ،والسعر مناسب جدا للمزايده عليها',
            'star_rating' => '3',
            'created_at'=> $faker->date('Y-m-d', $unixTimestamp),
            'updated_at' => $faker->date('Y-m-d', $unixTimestamp),
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '7',
            'name'=> 'مختار غالب',
            'comments' => 'احدى اضخم العروض السيارات بالشرق الاوسط',
            'star_rating' => '5',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '8',
            'name'=> 'نشوان ',
            'comments' => 'يااارب تكون من نصيبي',
            'star_rating' => '4',
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'هيفاء نبيل ',
            'comments' => 'ابهرتني العروض ، فعلا تستحق المزايده',
            'star_rating' => '2',
        ]);
         DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'رقيه عبده',
            'comments' => 'لاباس ',
            'star_rating' => '1',
        ]);
    }
}
