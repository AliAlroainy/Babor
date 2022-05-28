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
            'name'=> 'ناديه المليكي',
            'comments' => 'رائع',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()

        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'احمد الخرساني',
            'comments' => 'ممتاز ،انصح بشراء من هذا البائع',
            'star_rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'هاني الرعيني',
            'comments' => 'كنت اتمني المزايده بهذه السياره ،لكن لتوي انهيت احدى المزادات',
            'star_rating' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'نهى البكيل',
            'comments' => 'جيد، لاباس بها',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '5',
            'name'=> 'هيثم المقطري ',
            'comments' => 'موقع بابور موقع امن دائما يوفر افضل العروض',
            'star_rating' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '6',
            'name'=> 'ممحمد الفقي',
            'comments' => 'سياره واو ،والسعر مناسب جدا للمزايده عليها',
            'star_rating' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '7',
            'name'=> 'مختار غالب',
            'comments' => 'احدى اضخم العروض السيارات بالشرق الاوسط',
            'star_rating' => '5',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '8',
            'name'=> 'نشوان حسان',
            'comments' => 'يااارب تكون من نصيبي',
            'star_rating' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('review_ratings')->insert([
            'user_id' => '3',
            'name'=> 'هيفاء قاسم ',
            'comments' => 'ابهرتني العروض ، فعلا تستحق المزايده',
            'star_rating' => '2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
         DB::table('review_ratings')->insert([
            'user_id' => '4',
            'name'=> 'رقيه عبده',
            'comments' => 'لاباس ',
            'star_rating' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
